///<reference path="../../typings/bootstrap.d.ts"/>
///<reference path="../../typings/jquery.d.ts"/>
///<reference path="../../typings/knockout.d.ts"/>
///<reference path="../../typings/pnotify.d.ts"/>
///<reference path="../../typings/forms.d.ts"/> 
///<reference path="../../typings/blockui.d.ts"/>
///<reference path="../../typings/select2custom.d.ts"/>
///<reference path="../../typings/grid.d.ts"/>
///<reference path="smartyVariables.d.ts"/>	

class deleteActionViewModel {
	actionId: Function;
	constructor() {
		this.actionId = ko.observable();
	}
}

class addUpdateActionViewModel {
	actionId: Function;
	resourceDescription: Function;
	actionName: Function;
	actionDescription: Function;
	constructor() {
		this.actionId = ko.observable();
		this.resourceDescription = ko.observable();
		this.actionName = ko.observable();
		this.actionDescription = ko.observable();
	}
}


let deleteViewModel: deleteActionViewModel = new deleteActionViewModel();
ko.applyBindings(deleteViewModel, $('#deleteActionForm')[0]);

let addUpdateViewModel: addUpdateActionViewModel = new addUpdateActionViewModel();
ko.applyBindings(addUpdateViewModel, $('#addActionForm')[0]);

//nr de rezultate întoarse pentru auto complete. Daca sunt întoarse 0 trebuie să creez un nou grup
//deci trebuie să afișez și descrierea grupului
//este nevoie de o valoare implicită nenulă pentru a nu se afișa descrierea înainte ca utilizatorul
//să selecteze ceva
let numberOfResults: number = 1;

let showingAddModal: boolean = true;



function addAction(): void {

	$.blockUI({ baseZ: 9000 });

	let data: any = ko.toJS(addUpdateViewModel);

	data.resourceName = $('#resourceName').val();

	let url: string = addActionUrl;
	if (addUpdateViewModel.actionId())
		url = updateActionUrl;

	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'json',
		data: data,
		error: function() {
			$.unblockUI();
			new PNotify({ title: 'Error', text: 'Server communication error.', type: 'error', styling: 'bootstrap3' });
		},
		success: function(response) {
			$.unblockUI();
			if (!$('#addActionForm').formz('processErrors', response))
				return;
			if (addUpdateViewModel.actionId())
				new PNotify({ title: 'Info', text: 'Action was updated', type: 'info', styling: 'bootstrap3' });
			else
				new PNotify({ title: 'Info', text: 'Action was added', type: 'info', styling: 'bootstrap3' });


			$('#addActionModal').modal('hide');
			$('#authorizations').grid('reload');

		}
	});
}

function showAddActionModal(): void {

	addUpdateViewModel.actionId(undefined);

	showingAddModal = true;
	$('#addActionLabel').text('Add Action');

	$('#resourceName').empty();
	$('#resourceName').append($("<option></option>")
		.attr("value", '')
		.text(''));
	$('#selectElement').select2('val', '', true);

	addUpdateViewModel.resourceDescription(null);
	addUpdateViewModel.actionName(null);
	addUpdateViewModel.actionDescription(null);

	$('#addActionModal').formz('clearErrors');
}

function onEditAction(id: number): void {
	addUpdateViewModel.actionId(id);

	$.ajax({
		url: getActionUrl
		, type: 'POST'
		, dataType: 'json'
		, data: { id: id }
		, error: function() {
			new PNotify({ title: 'Eroare', text: 'Server communication error.', type: 'error', styling: 'bootstrap3' });

		}
		, success: function(response) {
			if (!$('#addActionModal').formz('processErrors', response))
				return;

			showingAddModal = false;

			/* merge
            $('#resourceName').select2("trigger", "select", {
                data: { id: response.action.groupName, text: response.action.groupName }
            });
			*/
		   
			//nu merge
			//  $('#resourceName').select2('data', {id: response.action.groupName, text: response.action.groupName});   
			//  $('#resourceName').trigger("change")
		   
			//nu merge
			//$('#resourceName').val(response.action.groupName).trigger('change');
		   
		   
			//$('#resourceName').select2('val', {id: response.action.groupName, text: response.action.groupName}, true);
		   
			//merge
			$('#resourceName').empty();
			$('#resourceName').append($("<option></option>")
				.attr("value", response.action.groupName)
				.text(response.action.groupName));
			$('#selectElement').select2('val', response.action.groupName, true);



			addUpdateViewModel.resourceDescription(response.action.groupDescription);
			addUpdateViewModel.actionName(response.action.actionName);
			addUpdateViewModel.actionDescription(response.action.actionDescription);

			$('#addActionLabel').text('Update Action');

			$('#addActionModal').formz('clearErrors');

			$('#resourceDescriptionGroup').removeClass('hide');

			$('#addActionModal').modal('show');

		}
	});
}

function onDeleteAction(id: number): void {

	//alert(ko.toJSON(addUpdateViewModel));
	deleteViewModel.actionId(id);
	$('#deleteActionModal').modal('show');
}

function actionFormatter(value: any, id: number): string {
	return '<a href="javascript:onEditAction(' + id + ')"><span class="glyphicon glyphicon-edit"></span></a>'
		+ ' <a href="javascript:onDeleteAction(' + id + ')"><span class="glyphicon glyphicon-trash"></span></a>';
}

function descriptionFormatter(value: any, id: number): string {
	if (value === null) return '';
				else return value;
}

function deleteAction(): void {

	$.blockUI({ baseZ: 9000 });

	$.ajax({
		url: deleteActionUrl
		, type: 'POST'
		, dataType: 'json'
		, data: ko.toJS(deleteViewModel)
		, error: function() {
			$.unblockUI();
			new PNotify({ title: 'Eroare', text: 'Server communication error.', type: 'error', styling: 'bootstrap3' });
		}
		, success: function(response) {
			if (!$('#deleteActionlModal').formz('processErrors', response))
				return;
			$('#deleteActionModal').modal('hide');
			$('#authorizations').grid('reload');
			$.unblockUI();

			new PNotify({ title: 'Into', text: 'The action was deleted.', type: 'info', styling: 'bootstrap3' });
		}
	});
}

$(function() {
	$('#AddActionButton').click(showAddActionModal);
	$('#deleteActionOk').click(deleteAction);
	$('#saveChanges').click(addAction);

	//Dacă este apăsat enter într-un input din formular se dă submit formularului, modific acțiunea formularului.
	//Formularul la submit va apela funcția ce adaugă datele folosind ajax
	$('#addActionForm').submit(function(event) {
		// prevent default browser behaviour
		event.preventDefault();

		addAction();
	});
	$('#authorizations').grid({
		url: browseAuthorizationsUrl
		, columns: [
			{ index: 'searchGroupName', label: 'Resource', sortable: true, searchable: true }
			, { index: 'searchActionName', label: 'Action', sortable: true, searchable: true }
			, { index: 'searchDescription', label: 'Description', sortable: true, formatter: descriptionFormatter, searchable: true }
			, { index: 'actions', label: '', sortable: false, width: 40, formatter: actionFormatter, searchable: false }
		]

		, columnFilters: true
		, rowNumbers: true

		//, searchBox: true
	});


	$("#resourceName").select2({
		placeholder: 'Select resource',
		ajax: {
			url: getResourceUrl,
			dataType: 'json',
			type: 'POST',
			delay: 250,
			data: function(params) {
				return {
					search: params.term, // search term
					rows: 5
				};
			},
			processResults: function(data, params) {
				numberOfResults = data.items.length;
				return {
					results: $.map(data.items, function(item) {
						return {
							id: item.id,
							text: item.text
						};
					})
				};
			}
		}
		, tags: true
	});

	$('#resourceName').on('select2:select', function(e) {
		if (numberOfResults === 0 || showingAddModal === false) {
			$('#resourceDescriptionGroup').removeClass('hide');
		}
		else $('#resourceDescriptionGroup').addClass('hide');
	});
});
