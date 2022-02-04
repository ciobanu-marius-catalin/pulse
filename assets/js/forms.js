function ProcessFormErrors(response) {
	if( ! response || ! response.success ) {
		if( ! response ) 
			new PNotify({ title: 'Eroare', text: 'Răspunsul server-ului este neinteligibil.', type: 'error', styling: 'bootstrap3' });
		else {
			if( response.message )
				new PNotify({ title: 'Eroare', text: response.message, type: 'error', styling: 'bootstrap3' });

			if( response.errors ) {
				for(var field in response.errors ) {
					$('#' + field).parentsUntil('.form-group').parent().addClass('has-error');
					new PNotify({ title: 'Eroare', text: response.errors[field].join('\n'), type: 'error', styling: 'bootstrap3' });
				}
			}

			if( ! response.message && ! response.errors )
				new PNotify({ title: 'Eroare', text: 'Eroare nespecificată.', type: 'error', styling: 'bootstrap3' });
		}

		$.unblockUI();
		return false;
	}

	return true;
}

function ProcessFormData() {
	$('div.form-group.has-error').removeClass('has-error');

	var data = {};

	var fields = $('form.form-horizontal').find('input,select,textarea');
	for(var i = 0; i < fields.length; i++) {
		if( $(fields[i]).is(':checkbox') )
			data[$(fields[i]).attr('id')] = $(fields[i]).is(':checked') ? 1 : 0;
		else
			data[$(fields[i]).attr('id')] = $.trim($(fields[i]).val());
	}

	return data;
}

(function ($) {
	$.fn.formz = function(action, params, params2) {
		if( action === undefined || action === 'getData' ) {
			var data = {};

			var fields = this.find('input,select,textarea');
			for(var i = 0; i < fields.length; i++) {
				var field = $(fields[i]);
				var name = field.attr('name');
				if( name === undefined )
					continue;

				if( $(fields[i]).is(':checkbox') )
					data[name] = field.is(':checked') ? 1 : 0;
				else if( field.data('select2') )
					data[name] = field.val();
				else if( field.parent().data('DateTimePicker') ) {
					var date = field.parent().data('DateTimePicker').date();
					if( date )
						data[name] = date.format('YYYY-MM-DD HH:mm:ss');
				}
				else
					data[name] = $.trim(field.val());
			}

			return data;
		}
		else if( action === 'clearErrors' ) {
			this.find('div.form-group.has-error').removeClass('has-error');
			PNotify.removeAll();
		}
		else if( action === 'processErrors' ) {
			if( params !== undefined ) {
				if( ! params || ! params.success ) {
					if( ! params ) 
						new PNotify({ title: 'Eroare', text: 'Răspunsul server-ului este neinteligibil.', type: 'error', styling: 'bootstrap3' });
					else {
						if( params.message )
							new PNotify({ title: 'Eroare', text: params.message, type: 'error', styling: 'bootstrap3' });

						if( params.errors ) {
							for(var field in params.errors ) {
								this.find('[name="' + field + '"]').closest('.form-group').addClass('has-error');
								new PNotify({ title: 'Eroare', text: params.errors[field].join('\n'), type: 'error', styling: 'bootstrap3' });
							}
						}

						if( ! params.message && ! params.errors )
							new PNotify({ title: 'Eroare', text: 'Eroare nespecificată.', type: 'error', styling: 'bootstrap3' });
					}

					$.unblockUI();
					return false;
				}

				if( params.message )
					new PNotify({ title: 'Eroare', text: params.message, type: 'error', styling: 'bootstrap3' });

				if( params.warnings && params.warnings.length ) {
					new PNotify({ title: 'Atenție', text: params.warnings.join('\n'), type: 'warning', styling: 'bootstrap3' });
				}

				if( params.qualifiedWarnings ) {
					for(var field in params.qualifiedWarnings) {
						this.find('[name="' + field + '"]').closest('.form-group').addClass('has-warning');
						new PNotify({ title: 'Atenție', text: params.qualifiedWarnings[field].join('\n'), type: 'warning', styling: 'bootstrap3' });
					}
				}

				return true;
			}
		}
		else if( action === 'submitForm' ) {
			if( params !== undefined && params2 !== undefined  ) {
				var form = $('<form method="POST" action="' + params + '"></form>');

				for(var name in params2) {
					if( $.isArray(params2[name]) ) {
						if( params2[name].length > 1 ) {
							for(var i = 0; i < params2[name].length; i++)
								form.append('<input type="hidden" name="' + name + '[]" value="' + params2[name][i] + '"/>');
						}
						else
							form.append('<input type="hidden" name="' + name + '" value="' + params2[name][0] + '"/>');
					}
					else
						form.append('<input type="hidden" name="' + name + '" value="' + params2[name] + '"/>');
				}

				$('body').append(form);
				form.submit().remove();
			}
		}
	};
}( jQuery ));
