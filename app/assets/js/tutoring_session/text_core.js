var tsInitText = function (setup) {
	tinymce.init({
		selector: 'textarea#ts-text-textarea',
		width: 718,
		height: 397,
		resize: false,
		statusbar: false,
		setup: setup,
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		menu: { 
			file: {title: 'File', items: 'save_file print'}, 
			edit: {title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace'}, 
			insert: {title: 'Insert', items: 'image link | charmap insertdatetime'}, 
			view: {title: 'View', items: 'visualaid | preview fullscreen'}, 
			format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'}, 
			table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'}
		},
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
};
