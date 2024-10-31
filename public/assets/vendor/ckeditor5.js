import {
    ClassicEditor,
    AccessibilityHelp,
    Autosave,
    Bold,
    Essentials,
    Italic,
    Link,
    Paragraph,
    SelectAll,
    Undo,
    Image,
    ImageUpload,
    BlockQuote,
    Table,
    Alignment,
    List,
} from 'ckeditor5';

const editorConfig = {
    toolbar: {
        items: [
            'paragraph', 'heading1', 'heading2', '|',
            'bold', 'italic', 'link', '|',
            'bulletedList', 'numberedList', '|',
            'alignment:left', 'alignment:center', 'alignment:right', 'alignment:justify', '|',
            'imageUpload', 'blockQuote', 'table', '|',
            'undo', 'redo', 'selectAll', '|',
            'accessibilityHelp'
        ],
        shouldNotGroupWhenFull: false
    },
    placeholder: 'Escreva aqui...',
    plugins: [
        AccessibilityHelp, Autosave, Bold, Essentials, Italic, Link, Paragraph, SelectAll, Undo,
        Image, ImageUpload, BlockQuote, Table, Alignment, List
    ],
    mention: {
        feeds: [
            {
                marker: '@',
                feed: [
                    // Lista de sugestões para menções
                ]
            }
        ]
    },
};

document.addEventListener('DOMContentLoaded', function () {
    const contentElement = document.querySelector('#content');

    if (contentElement) {
        ClassicEditor
            .create(document.querySelector('#content'), editorConfig)
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

    } else {
        console.error('Elemento #content não encontrado.');
    }
});
