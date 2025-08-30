$(function (e) {
	//file export datatable
    if (window.pdfMake) {
        // Ensure Tajawal fonts are available in pdfMake's VFS
        try {
            if (window.vfs) {
                if (typeof pdfMake.addVirtualFileSystem === 'function') {
                    pdfMake.addVirtualFileSystem(window.vfs);
                } else if (!pdfMake.vfs || !pdfMake.vfs['Tajawal-Regular.ttf']) {
                    pdfMake.vfs = window.vfs;
                }
            }
        } catch (e) {
            // swallow; fallback to default vfs if present
        }
        // Map Tajawal font family
        pdfMake.fonts = Object.assign({}, pdfMake.fonts, {
            Tajawal: {
                normal: 'Tajawal-Regular.ttf',
                bold: 'Tajawal-Bold.ttf',
                italics: 'Tajawal-Regular.ttf',
                bolditalics: 'Tajawal-Bold.ttf'
            }
        });
    }
	//file export datatable
	var table = $('#example').DataTable({
		lengthChange: false,
		buttons: [
			'copy',
			'excel',
			{
				extend: 'pdf',
				customize: function (doc) {
					doc.defaultStyle.font = 'Tajawal';
					doc.defaultStyle.alignment = 'right';
					doc.pageDirection = 'rtl';
					if (doc.styles && doc.styles.tableHeader) {
						doc.styles.tableHeader.alignment = 'right';
					}
				}
			},
			'colvis'
		],
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ ',
		}
	});
	table.buttons().container()
		.appendTo('#example_wrapper .col-md-6:eq(0)');

	$('#example1').DataTable({
		language: {
			searchPlaceholder: '...ابحث',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	$('#example2').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: '...ابحث',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	var table = $('#example-delete').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: '...ابحث',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	$('#example-delete tbody').on('click', 'tr', function () {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});

	$('#button').click(function () {
		table.row('.selected').remove().draw(false);
	});

	//Details display datatable
	$('#example-1').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: '...ابحث',
			sSearch: '',
			lengthMenu: '_MENU_',
		},
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal({
					header: function (row) {
						var data = row.data();
						return 'Details for ' + data[0] + ' ' + data[1];
					}
				}),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll({
					tableClass: 'table border mb-0'
				})
			}
		}
	});
});
