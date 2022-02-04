///<reference path="../../typings/jquery.d.ts"/>
///<reference path="../../typings/knockout.d.ts"/>
///<reference path="../../typings/pnotify.d.ts"/>
///<reference path="smartyVariables.d.ts"/>
$(function () {
    if (messages) {
        $('#authForm').formz('processErrors', messages);
        for (var i = 0; i < messages.length; i++) {
            new PNotify({ title: 'Eroare', text: messages[i], type: 'error', styling: 'bootstrap3' });
        }
    }
    var authenticateViewModel = (function () {
        function authenticateViewModel() {
            this.username = ko.observable();
            this.password = ko.observable();
            if (!redirect)
                this.redirect = ko.observable();
            else
                this.redirect = ko.observable(redirect);
        }
        return authenticateViewModel;
    }());
    var viewModel = new authenticateViewModel();
    ko.applyBindings(viewModel);
});
