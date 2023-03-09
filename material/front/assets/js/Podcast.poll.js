// First, let's create a namespace.  It's not required, but it's usually a
// good idea.
var Podcast = Podcast || {};
// Let's add our module to the namespace.  Basically, it's just a property of
// the namespace.  Note that our module is actually a function.  We're going
// to use JavaScript closures to emulate private methods, which are not
// natively part of JavaScript.
Podcast.poll = (function () {
    'use strict';
    // Let's define a private and public property.  Note that we define them in
    // exactly the same way.  The bit that specifies whether they are
    // public/private comes later...
    var _userId,
        options = {},
        possibleAnswers = {},
        history = [],
        _loggedInStatusEndpoint,
        _storeVoteEndpoint;

    // Let's declare a simple private function.
    var getCustomerDetails = function () {
        //console.log("myPrivateFunction()", _customerId);
        const obj = JSON.stringify({ 'query': 'start_poll' });
        return $.ajax({
            url: _loggedInStatusEndpoint,
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            type: "POST",
            data: obj,
            cache: false,
            //processData: false,
            dataType: "json",
        });

    };

    var storeVote = function (input) {
        const obj = JSON.stringify(input);
        return $.ajax({
            url: _storeVoteEndpoint,
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            type: "POST",
            dataType: "json",
            data: obj,
            cache: false,
        });
    }

    var checkUserLoggedInStatus = function (endpoint) {
        debugger;
        _loggedInStatusEndpoint = endpoint;
        return getCustomerDetails();
    }

    var vote = async function (answerId, name = "Anonymouse", poll_parent, endpoint) {
        if (this.possibleAnswers[answerId]) {
            let getCurrentDate = new Date().toLocaleString();
            //store in database
            var self = this;
            _storeVoteEndpoint = endpoint;
            return await storeVote({ poll_id: poll_parent, poll_option_id: answerId, userId: name }).done(function (result) {

                result.forEach(votes => {
                    self.history.push({ id: votes.poll_option_id, name: votes.userId, date: votes.created_at });
                });
                console.log("done pushing to local store");
            });

            //return true;
        } else throw new Error("Incorrect answer's id");
    }

    var getResults = function () {
        debugger;
        let numberOfVotes = this.history.length,
            votesResults = [];

        Object.keys(this.possibleAnswers).forEach(answerId => {
            let answerIdCounter = 0;
            let voters = [];
            this.history.forEach(vote => {
                if (answerId == vote.id) {
                    answerIdCounter++;
                    voters.push(vote.name);
                }
            });
            let percentOfAllVotes = answerIdCounter / numberOfVotes * 100;
            let formatedPercent = isNaN(percentOfAllVotes) ?
                0 :
                parseFloat(percentOfAllVotes).
                    toFixed(3).
                    slice(0, -1);
            votesResults.push({
                votes: answerIdCounter,
                voters: voters,
                percent: formatedPercent
            });

        });

        return votesResults;
    }

    var init = function (question, answers, options) {
        const defaultOptions = {};
        this.options = Object.assign({}, defaultOptions, options);
        this.history = [];
        this.possibleAnswers = answers;

    }

    //Public API/s
    return {
        isLoggedIn: checkUserLoggedInStatus,
        doVote: vote,
        results: getResults,
        init: init

    };
})();