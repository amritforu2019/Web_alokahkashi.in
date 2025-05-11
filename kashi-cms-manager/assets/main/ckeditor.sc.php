<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace( 'editor',{
	toolbar :
        [	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },

            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', ] },

            { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },

            { name: 'colors', items : [ 'TextColor','BGColor' ]},

                                                        '/',

            { name: 'document', items : [ 'Source','-','Preview','Print','-'] },

            { name: 'tools', items : [ 'Maximize'] },

            { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },

            { name: 'editing', items : [ 'Find','Replace','-','SpellChecker'] },

            { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','SpecialChar' ] },

            { name: 'links', items : [ 'Link','Unlink','Anchor' ] }


    	],


	filebrowserBrowseUrl : 'assets/ckfinder/ckfinder.html',

    filebrowserImageBrowseUrl : 'assets/ckfinder/ckfinder.html?type=Images',

    filebrowserFlashBrowseUrl : 'assets/ckfinder/ckfinder.html?type=Flash',

    filebrowserUploadUrl : 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

    filebrowserImageUploadUrl : 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

    filebrowserFlashUploadUrl : 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

});
</script>