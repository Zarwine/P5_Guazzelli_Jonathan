<?php session_start();
if($_SESSION['auth']->admin == 0){
    $_SESSION['alert']['danger'] = "Vous n'avez pas l'autorisation d'accéder à cette page";
    header('Location: home');
}
?>
<div id="container" class="page_container">
    <h2>Écrire un article</h2>

    <form class="jf_form" action="<?php echo HOST;?>add" method="post">

        <?php if($pf_article->getId()):?>
            <input type="hidden" name="values[id]" value="<?php echo $pf_article->getId();?>"/>
        <?php endif;?>
        Nom de l'article : <input type="text" name="values[name]" value="<?php echo $pf_article->getName();?>" required/><br/>
        Contenu de l'article : <textarea id="mytextarea" name="values[content]" ><?php echo $pf_article->getContent();?></textarea><br/>
        <input class="button_jf" type="submit" value="ajouter"/>
    </form>
</div>
<script src="https://cdn.tiny.cloud/1/rhmcwo4c3c04oqicyi140d661xaxcuor848zntmj4er65w6b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#mytextarea',
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        // without images_upload_url set, Upload tab won't show up
        images_upload_url: '<?php echo HOST; ?>TinyMCEImageUpload',
        images_upload_base_path: 'https://jogu.fr/Portfolio/upload/',
        automatic_uploads: true,
        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '<?php echo HOST; ?>TinyMCEImageUpload');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                console.log(xhr.responseText)
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                console.log(json.location)
                success(json.location);
            };

            console.log(blobInfo.blob())

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            
            
            xhr.send(formData);
        },
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        content_css: '//www.tiny.cloud/css/codepen.min.css',        
        importcss_append: true,
        height: 400,       
        templates: [{
                title: 'New Table',
                description: 'creates a new table',
                content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
            },
            {
                title: 'Starting my story',
                description: 'A cure for writers block',
                content: 'Once upon a time...'
            },
            {
                title: 'New list with dates',
                description: 'New List with dates',
                content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
            }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_mode: 'sliding',
        contextmenu: "link image imagetools table",
    });
</script>
