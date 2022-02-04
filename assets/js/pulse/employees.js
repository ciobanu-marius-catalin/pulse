///<reference path="../../typings/bootstrap.d.ts"/>
///<reference path="../../typings/jquery.d.ts"/>
///<reference path="../../typings/knockout.d.ts"/>
///<reference path="../../typings/pnotify.d.ts"/>
///<reference path="../../typings/forms.d.ts"/> 
///<reference path="../../typings/blockui.d.ts"/>
///<reference path="../../typings/select2custom.d.ts"/>
///<reference path="../../typings/grid.d.ts"/>
///<reference path="../../typings/datetimepicker.d.ts"/>
///<reference path="smartyVariables.d.ts"/>	
$(function () {
    $('#startDate').datetimepicker();
	$('#addEmployee').click(function () {
		$('#addEmployeeModal').modal('show');
	});
	
    $('#employees').grid({
        url: browseEmployeesUrl,
        columns: [
            { index: 'familyName', label: 'Family Name', sortable: true, searchable: true },
            { index: 'givenName', label: 'Given Name', sortable: true, searchable: true },
            { index: 'code', label: 'Code', sortable: true, searchable: true },
            { index: 'tagNo', label: 'Tag Number', sortable: true, searchable: true },
            { index: 'position', label: 'Position', sortable: true, searchable: true }
        ],
        columnFilters: true,
        rowNumbers: true
    });
});
