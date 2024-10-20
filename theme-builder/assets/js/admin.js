jQuery(document).ready(function($) {
    let currentScreen = window.location.pathname;
    let searchParams = new URLSearchParams(window.location.search);

    // Check if we're on the 'Theme Builder' post type list or add new post page
    if ((currentScreen.includes('edit.php') && searchParams.get('post_type') === 'primekitlibrary') ||
        (currentScreen.includes('post-new.php') && (!searchParams.has('post_type') || searchParams.get('post_type') === 'primekitlibrary'))) {
        
        // Add the classes to the parent menu to show it as expanded and highlight the current menu item
        $('#toplevel_page_abcbiz_home').addClass('wp-has-current-submenu wp-menu-open').removeClass('wp-not-current-submenu');
        $('#toplevel_page_abcbiz_home').find('.wp-submenu li').removeClass('current'); // Remove the current class from all submenu items
        $('#toplevel_page_abcbiz_home').find('.wp-submenu li a[href="edit.php?post_type=primekitlibrary"]').parent().addClass('current'); // Highlight the 'Theme Builder' menu
    }

    // Set the default template for the 'primekitlibrary' post type
    let $templateSelect = $('#page_template');
    if ($templateSelect.length) {
        let canvasTemplateValue = 'elementor_canvas'; 
        $templateSelect.val(canvasTemplateValue).trigger('change');
    }

    let addNewBtn = $('a.page-title-action');

    // Override the click event for the "Add New" button
    addNewBtn.on('click', function(e) {
        e.preventDefault();

        // Initialize and show the modal using MicroModal
        MicroModal.show('abcbiz-tb-modal');
    });


});