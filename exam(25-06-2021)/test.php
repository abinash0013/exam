

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Essential JS 2 Rich Text Editor</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Typescript UI Controls" />
    <meta name="author" content="Syncfusion" />
    <link href="index.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/ej2-base/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/ej2-richtexteditor/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/ej2-inputs/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/ej2-lists/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/ej2-navigations/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/ej2-popups/styles/material.css" rel="stylesheet" />
     <link href="//cdn.syncfusion.com/ej2/ej2-buttons/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/ej2-splitbuttons/styles/material.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/systemjs/0.19.38/system.js"></script>
    <script src="systemjs.config.js"></script>

</head>

<body>
    <div id='loader'>Loading....</div>
    <div id='container'>
        <div id='defaultRTE'>
            <p>The Rich Text Editor is WYSIWYG ("what you see is what you get") editor useful to create and edit content, and return the valid <a href="https://ej2.syncfusion.com/home/" target="_blank">HTML markup</a> or <a href="https://ej2.syncfusion.com/home/"
                    target="_blank">markdown</a> of the content</p>
            <p><b>Key features:</b></p>
            <ul>
                <li>
                    <p>Provides <IFRAME> and <DIV> modes</p>
                </li>
                <li>
                    <p>Capable of handling markdown editing.</p>
                </li>
                <li>
                    <p>Contains a modular library to load the necessary functionality on demand.</p>
                </li>
            </ul>
        </div>
    </div>
    <style>
        .customClass .e-rte-content .e-content {
            /* to get the desired font on intially*/
            font-family: "Noto Sans";
        }
    </style>
</body>

</html>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <title>CKEditor 5 – Document editor</title>-->
<!--    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/decoupled-document/ckeditor.js"></script>-->
<!--    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/decoupled-document/translations/hi.js"></script>-->
<!--</head>-->
<!--<body>-->
<!--    <h1>Document editor</h1>-->

    <!-- The toolbar will be rendered in this container. -->
<!--    <div id="toolbar-container"></div>-->

    <!-- This container will become the editable. -->
<!--    <div id="editor">-->
<!--        <p>This is the initial editor content.</p>-->
<!--    </div>-->

<!--    <script>-->
<!--        DecoupledEditor-->
<!--            .create( document.querySelector( '#editor' ), { -->
<!--                    language: 'en', -->
<!--                    additionalLanguages: 'all',-->
<!--                    ui: 'en', -->
<!--                    content: 'hi',-->
<!--                 customConfig: 'ckeditor_config.js',-->
<!--                 fontFamily: {-->
<!--                    options: [-->
<!--                        'default',-->
<!--                        'AAText', -->
<!--                        'Arial, Helvetica, sans-serif',-->
<!--                        'Courier New, Courier, monospace',-->
<!--                        'Georgia, serif',-->
<!--                        'Lucida Sans Unicode, Lucida Grande, sans-serif',-->
<!--                        'Tahoma, Geneva, sans-serif',-->
<!--                        'Times New Roman, Times, serif',-->
<!--                        'Trebuchet MS, Helvetica, sans-serif',-->
<!--                        'Verdana, Geneva, sans-serif'-->
<!--                    ]-->
<!--                },-->
                //   toolbar: [
                //     'heading',
                //     'bold',
                //     'italic',
                //     'underline',
                //     'fontFamily',
                //     'fontSize',
                //     'fontColor',
                //     'undo',
                //     'redo',
                //     'alignment',
                //     'indent',
                //     'list',
                //     'horizontalLine',
                //     'paragraph',
                //     'removeFormat',
                //     'specialCharacters',
                //     'wordCount',
                //     'image'
                //   ],
<!--                }-->
<!--                )-->
<!--            .then( editor => {-->
<!--                const toolbarContainer = document.querySelector( '#toolbar-container' );-->

<!--                toolbarContainer.appendChild( editor.ui.view.toolbar.element );-->
<!--            } )-->
<!--            .catch( error => {-->
<!--                console.error( error );-->
<!--            } );-->
<!--    </script>-->
<!--</body>-->
<!--</html>-->