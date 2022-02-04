/**
 * @copyright (c) 2014, Antiferno SRL
 * @license http://www.gnu.org/licenses/gpl.html GPLv3
 * @author Andrei Ionescu
 * @link www.antiferno.ro
 */
function _log(message) {
	if( window.console && window.console.log )
		console.log(message);
}

(function($){
	function State() {
		this.page = 1;
	}

	function Grid(element, options) {
		var $options
			, $buttons	// Butoane și search box
			, $columnFilters = null // Filtre la nivel de coloane
			, $table, $header, $body, $columns, $pager, $state, $rows;
		var $params = {};

		this.$id = Math.random();

		this.params = function(object) {
			if( object === undefined )
				return $params;

			$.extend($params, object);
		};

		this.reload = function(args) {
			var data = {
				page: $state.page
				//, rows: $options.rowCount
			};

			if( typeof $state.rowCount === 'undefined' )
				data.rows = $options.rowCount;
			else
				data.rows = $state.rowCount;

			if( $state.sort !== null ) {
				data.sidx = $columns[$state.sort.index].index;
				data.sord = $state.sort.order;
			}

			if( $state.search )
				data.search = $state.search;

			// Filtrări la nivel de coloană
			if( $state.columnFilters === true ) {
				for(var i = 0; i < $columns.length; i++) {
					var value = $.trim($('#_g2_filter' + i).val());

					if( value.length )
						data[$columns[i].index] = value;
				}
			}

			/*
			if(args)
				$params = args;
			*/
			
			if( $params )
				$.extend(data, $params);

			if( args )
				$.extend(data, args);

			$.ajax({
				url: $options.url
				, type: "POST"
				, dataType: "json"
				, data: data
				, error: function(){_log('Error loading table data.');}
				, success: $.proxy(this.loadData, this)
			});
		};

		this.goToPage = function(page) {
			$state.page = page;
			this.reload();
		};
		
		this.onSelectRow = function(id) {
			alert(id);
		};

		this.loadData = function(response) {
			if( ! response.rows ) {
				_log('No rows.');
				return;
			}

			var $this = this;

			$rows = [];
			// Se șterge conținutul tabelului, mai puțin filtrele la nivel de coloană
			$body.find('tr:not(.filter)').remove();

			if( response.rows.length === 0 ) {
				$body.append('<tr class="info"><td colspan="' + $columns.length + '" style="text-align: center;padding: 10px;"><i class="glyphicon glyphicon-info-sign"></i> ' + $options.emptyText + '</td></tr>');
			}
			else {
				var rowCount = (typeof $state.rowCount === 'undefined') ? $options.rowCount : $state.rowCount;

				for(var i = 0; i < response.rows.length; i++) {
					var row = response.rows[i];

					if( $options.rowNumbers )
						row.cell.splice(0, 0, rowCount * ($state.page - 1) + i + 1);

					$rows.push(row);
				}

				for(var i = 0; i < $rows.length; i++) {
					var row = $('<tr></tr>');

					for(var j = 0; j < $columns.length; j++) {
						var styles = [];

						// Align
						if( $columns[j].align )
							styles.push('text-align: ' + $columns[j].align);

						if( $columns[j].width )
							styles.push('width: ' + $columns[j].width + ($.isNumeric($columns[j].width) ? 'px' : ''));
						
						// Stiluri definite de utiliator
						if( $columns[j].cellStyle )
							styles.push($columns[j].cellStyle);

						var style = styles.length ? ' style="' + styles.join(';') + '"' : '';

						var content = $rows[i].cell[j];
						if( $columns[j].formatter )
							content = $columns[j].formatter.call(this, content, $rows[i].id, $rows[i].cell);

						row.append('<td' + style + '><small>' + content + '</small></td>');
						row.attr('id', $rows[i].id);
					}

					$body.append(row);
				}

				// Register events
				if( $options.onSelectRow ) {
					$body.find('td').each(
						function() {
							$(this).click($options.onSelectRow.call(this, $(this).parent().attr('id')));
						}
					);
				}
			}

			// Pager
			$pager.empty();

			if( response.total > 1 ) {
				var start = response.page - 2;
				if( start < 1 )
					start = 1;

				var stop = response.page + 2;
				if( stop > response.total )
					stop = response.total;

				$pager.append('<li' + (start === 1 ? ' class="disabled"' : '') + '><span>&laquo;</span></li>');

				if( start > 1 )
					$pager.append('<li class="grid-pager"><span>1</span></li>');
				if( start > 1 )
					$pager.append('<li class="disabled"><span>...</span></li>');

				for(var i = start; i <= stop; i++) {
					if( i !== response.page )
						$pager.append('<li class="grid-pager"><span>' + i + '</span></li>');
					else
						$pager.append('<li class="active"><span>' + i + '</span></li>');
				}

				if( stop < response.total - 1)
					$pager.append('<li class="disabled"><span>...</span></li>');
				if( stop < response.total )
					$pager.append('<li class="grid-pager"><span>' + response.total + '</span></li>');

				$pager.append('<li' + (response.page === response.total ? ' class="disabled"' : '') + '><span>&raquo;</span></li>');

				$pager.find("li.grid-pager").each(
					function() {
						$(this).click($.proxy($this.goToPage, $this, parseInt($(this).text())));
					}
				);
			}

			// Pentru a preveni interferențele cu filtrările
			$state.search = null;

			// Eveniment sfârșit încărcare rânduri
			if( $options.loadComplete )
				$options.loadComplete.apply();
		};

		this.sort = function(index) {
			//alert('Mark');
			if( $state.sort !== null )
				$('#_g2_h' + $state.sort.index).removeClass('sort_up').removeClass('sort_down').addClass('sort');

			var order = $state.sort !== null && $state.sort.index === index && $state.sort.order === 'asc' ? 'desc' : 'asc';
			$('#_g2_h' + index).removeClass('sort').addClass('sort_' + (order === 'asc' ? 'up' : 'down'));

			$state.sort = {index: index, order: order};

			this.reload();
		};

		this.search = function(_x, event) {
			if( event.which === 13 ) {
				$state.search = $('#_g2_search').val();
				$('#_g2_search').val('');
				this.reload();
			}
		};

		/**
		 * Modificare număr rânduri afișate pe pagină
		 * @returns {undefined}
		 */
		this.rowsChanged = function() {
			$state.rowCount = $('#_g2_rows').val();
			//_log('Rowcount: ' + $state.rowCount);

			this.reload();
		};

		this.filter = function() {
			this.reload();
		};

		this.columnFilters = function(arg) {
			if( arg === 'show' ) {
				if( $columnFilters === null ) {
					// Obiectele nu au fost create, se crează acum
					var cells = [];
					var dates = [];

					for(var i = 0; i < $columns.length; i++) {
						var cell = '<td>';
						if( $columns[i].searchable !== false ) {
							if( typeof $columns[i].searchOptions === 'undefined' )
								$columns[i].searchOptions = {};

							if( typeof $columns[i].searchOptions.type === 'undefined' )
								$columns[i].searchOptions.type = 'text';

							if( typeof $columns[i].searchOptions.disabled === 'undefined' )
								$columns[i].searchOptions.disabled = false;

							if( $columns[i].searchOptions.type === 'text' )
								cell += '<input id="_g2_filter' + i + '" type="text" class="form-control input-sm"' + ($columns[i].searchOptions.disabled ? ' disabled="disabled"' : '') + '>';
							else if( $columns[i].searchOptions.type === 'select' ) {
								if( typeof $columns[i].searchOptions.values !== 'undefined' ) {
									var select = '<div class="form-group"><select id="_g2_filter' + i + '" class="form-control input-sm"' + ($columns[i].searchOptions.disabled ? ' disabled="disabled"' : '') + '">';

									for(var key in $columns[i].searchOptions.values)
										if($columns[i].searchOptions.values[key][1])
											select += '<option value="' + key + '" selected>' + $columns[i].searchOptions.values[key][0] + '</option>';
										else
											select += '<option value="' + key + '">' + $columns[i].searchOptions.values[key][0] + '</option>';

									select += '</select></div>';

									cell += select;
								}
							}
							else if( $columns[i].searchOptions.type === 'date' ) {
								cell += '<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input type="text" id="_g2_filter' + i + '" class="form-control input-sm" value=""' + ($columns[i].searchOptions.disabled ? ' disabled="disabled"' : '') + '/></div>';
								dates.push('#_g2_filter' + i);
							}
						}

						cell += '</td>';

						cells.push(cell);
					}
					
					var $this = this;

					$columnFilters = $('<tr class="filter">' + cells.join('') + '</tr>');
					$columnFilters.find('input:text').on('keypress', $.proxy(function(e){if( e.which === 13 ) $this.reload();}, $this));
					$columnFilters.find('select').on('change', $.proxy($this.reload, $this, null));

					$body.prepend($columnFilters);

					if( dates.length )
						$(dates.join(',')).datetimepicker(/*{format: "dd.mm.yyyy", autoclose: true}*/)
							.on('dp.change', $.proxy(function(e){$this.reload();}, $this));
				}
				else
					$columnFilters.show();

				$state.columnFilters = true;
			}
			else if( arg === 'hide' ) {
				if( $state.columnFilters === true ) {
					$columnFilters.hide();

					$state.columnFilters = false;
				}
			}
		};

		/**
		 * Constructor (yeah, right;)
		 * 
		 * @returns {undefined}
		 */
		this.construct = function() {
			var $this = this;

			$options = $.extend( {}, $.fn.grid.defaults, options );

			// Rând butoane și Search
			// Primul element este numărul de rânduri de afișat pe o pagină
			if( $options.rowList !== false || $options.searchBox || ($options.buttons && $.isArray($options.buttons) && $options.buttons.length) ) {
				$buttons = $('<div class="row" style="padding-top: 15px;"></div>');

				// Selector număr de rânduri pe pagină
				if( $options.rowList !== false ) {
					var rowsOptions = [];
					for(var i = 0; i < $options.rowList.length; i++) {
						rowsOptions.push('<option value="' + $options.rowList[i] +  '"' 
									+ ($options.rowList[i] === $options.rowCount ? ' selected="selected"' : '') + '>' 
								+ ($options.rowList[i] ? $options.rowList[i] : $options.rowAll) + '</option>');
					}

					$buttons.append('<div class="col-sm-3" style="padding-top: 5px;"><select id="_g2_rows">' + rowsOptions.join('') + '</select>' + $options.rowLabel + '</div>');

					$buttons.find('select').each(function(){
						$(this).change($.proxy($this.rowsChanged, $this));
					});
				}

				// Butoane specificate de utilizator
				if( $options.buttons && $.isArray($options.buttons) ) {
					var holder = $('<div class="col-sm-' + ($options.rowList !== false ? 7 : 10) + '"></div>');

					for(var i = 0; i < $options.buttons.length; i++) {
						if( ! $options.buttons[i].label )
							continue;
						
						var classes = $options.buttons[i].class ? $options.buttons[i].class : 'btn btn-sm btn-default';

						var button = $('<button type="button" class="' + classes + '">' + $options.buttons[i].label + '</button>');
						holder.append(button);

						if( $options.buttons[i].click )
							button.click($options.buttons[i].click);
					}

					$buttons.append(holder);
				}
				else
					$buttons.append('<div class="col-sm-' + ($options.rowList !== false ? 7 : 10) + '"></div>');

				// Căsuță search
				if( $options.searchBox ) {
					$buttons.append('<div class="input-group input-group-sm"><input id="_g2_search" class="form-control" placeholder="' + $options.searchText + '" type="text"><span class="input-group-addon glyphicon glyphicon-search"></span></div>');

					$buttons.find('input').each(function(){
						$(this).keypress($.proxy($this.search, $this, $(this).val()));
					});
				}

				$buttons.appendTo(element);
			}

			$table = $('<table class="table table-bordered table-hover table-condensed table-striped grid2" style="margin-top: .5em;"><thead><tr></tr></thead><tbody></tbody></table>');
			$header = $table.find('thead > tr');
			$body = $table.find('tbody');

			// Coloane
			$columns = [];
			if( $options.rowNumbers )
				$columns.push({index: '_index', label: '&#35;', align: 'right', width: '1em', headerAlign: 'center'});

			for(var i = 0; i < $options.columns.length; i++)
				$columns.push($options.columns[i]);

			// Header
			for(var i = 0; i < $columns.length; i++) {
				var styles = [];
				var classes = [];

				// Lățime coloane
				if( $columns[i].width ) {
					if( $.isNumeric($columns[i].width) )
						styles.push('width: ' + $columns[i].width + 'px');
					else
						styles.push('width: ' + $columns[i].width);
				}
				
				// Stiluri definite de utiliator
				if( $columns[i].headerStyle )
					styles.push($columns[i].headerStyle);

				// Align
				if( $columns[i].headerAlign )
					styles.push('text-align: ' + $columns[i].headerAlign);

				var style = '';
				if( styles.length )
					style = ' style="' + styles.join(';') + '"';

				// Sortable
				// Prima coloană nu se sortează, dacă este cu numere de ordine
				if( ! $options.rowNumbers || i ) {
					if( $columns[i].sortable !== false ) {
						classes.push('sortable');

						// Ordonare implicită
						if( $options.sortname === $columns[i].index )
							classes.push('sort_' + ($options.sortorder === 'desc' ? 'down' : 'up'));
						else
							classes.push('sort');
					}
				}


				var cssClass = '';
				if( classes.length )
					cssClass = ' class="' + classes.join(' ') + '"';

				var cell = $('<th' + style + cssClass + ' id="_g2_h' + i + '">' + $columns[i].label + '</th>');

				cell.appendTo($header);
			}

			// Inserare element în DOM
			$table.appendTo(element);

			// Click on header
			$table.find('th.sortable').each(function(){
				$(this).click($.proxy($this.sort, $this, parseInt($(this).attr('id').substr('_g2_h'.length))));
			});

			// Paginare
			$pager = $('<ul class="pagination pagination-sm"></ul>');
			$table.after('<div class="row"><div class="col-sm-12"></div></div>');
			$table.next().find("div").append($pager);

			// Stare inițială
			$state = new State();
			$state.sort = null;	// $start.sort.index numeric, index-ul coloanei

			if( $options.sortname ) {
				// Se verifică dacă index-ul furnizat pentru coloana de sortare există în grid
				var i = 0;
				while( i < $columns.length && $columns[i].index !== $options.sortname )
					i++;

				if( i < $columns.length ) {
					$state.sort = {
						index: i
						, order: $options.sortorder
					};
				}
			}

			// Parametri
			$params = $options.params;
			
			if( $options.columnFilters === true )
				this.columnFilters('show');

			// Încărcare inițială
			this.reload();
		};
		this.construct();
	}

	$.fn.grid = function() {
		var option = arguments[0];
		//var args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
		var args = 2 <= arguments.length ? [arguments[1]] : [];

		var ret = this;
		return this.each(function() {
			var $this = $(this);

			var $grid = $this.data('grid');
			if( ! $grid ) {
				$this.data('grid', $grid = new Grid(this, option));
			}

			if( typeof option === "string" ) {
				return ret = $grid[option].apply($grid, args);
			}
		});

		return ret;
	};

	$.fn.grid.defaults = {
		url: null
		, columns: []
		, rowNumbers: false
		// Se afișează sau nu filtrele la nivel de coloană de la început
		, columnFilters: false
		, rowCount: 20
		, rowList: [20, 50, 100, 0]	// false dacă nu se dorește afișarea
		, rowLabel: ' rânduri pe pagină'
		, rowAll: 'Toate'
		, searchBox: false
		, searchButton: false
		, buttons: []
		, params: 'Activi'
		, emptyText: 'Niciun element nu a fost regăsit.'
		, searchText: 'Căutare'
		// Ordinea implicită de sortare
		, sortname: null
		, sortorder: 'asc'	// asc|desc
		// Events
		, loadComplete: null
		, onSelectRow: null
	};
}(jQuery));
