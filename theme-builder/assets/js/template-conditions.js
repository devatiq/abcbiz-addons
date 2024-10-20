jQuery(document).ready(function ($) {
  /**
   * Add a custom menu item to the Elementor panel footer.
   *
   * Adds a new menu item "Template Conditions" next to the "Save as Template" menu item.
   * The menu item opens a modal with the ID "abcbiz-tb-editor-modal".
   *
   * @since 1.0.0
   */
  function abcbizAddCustomMenuItem() {
    let customMenuItem = $(
      '<div class="elementor-panel-footer-sub-menu-item abcbiz-addons-menu-item" id="elementor-panel-footer-sub-menu-item-template-conditions">' +
        '<i class="abcbiz-addons-icon" aria-hidden="true"></i>' +
        '<span class="elementor-title">Template Conditions</span>' +
        "</div>"
    );

    let saveTemplateMenuItem = $(
      "#elementor-panel-footer-sub-menu-item-save-template"
    );

    if (saveTemplateMenuItem.length > 0) {
      saveTemplateMenuItem.before(customMenuItem);

      customMenuItem.on("click", function () {
        console.log("Clicked menu item");
        MicroModal.show("abcbiz-tb-editor-modal");
        console.log("Clicked after modal");
      });
    } else {
      console.error(
        "Save as Template menu item not found. Unable to add custom menu item."
      );
    }
  }

 // setTimeout(abcbizAddCustomMenuItem, 1000);
});

jQuery(document).ready(function ($) {
  $(".abcbiz-tb-modal-condition-repeater-btn").click(function () {
    let conditionHTML =
      '<div class="abcbiz-tb-modal-condition-field">' +
      // '<div class="abcbiz-tb-modal-condition-type">' +
      // '<select name="abcbiz_tb_modal_condition_type[]" class="abcbiz-tb-modal-condition-type-select">' +
      // '<option value="include">Include</option>' +
      // '<option value="exclude">Exclude</option>' +
      // "</select>" +
      // "</div>" +
      '<select name="abcbiz_tb_modal_condition_scope[]" class="abcbiz-tb-modal-condition-scope-select">' +
      '<option value="entire_site">Entire Site</option>' +
      '<option value="archive">Archive</option>' +
      '<option value="singular">Singular</option>' +
      "</select>" +
      '<button class="abcbiz-tb-modal-delete-condition" type="button"><i class="eicon-trash" aria-hidden="true"></i></button>' +
      "</div>";

    $("#abcbiz-tb-modal-condition-wrapper").append(conditionHTML);
  });

  $(document).on("click", ".abcbiz-tb-modal-delete-condition", function () {
    $(this).closest(".abcbiz-tb-modal-condition-field").remove();
  });

  $(document).on(
    "change",
    ".abcbiz-tb-modal-condition-scope-select",
    function () {
      let selectedValue = $(this).val();
      let currentField = $(this).closest(".abcbiz-tb-modal-condition-field");
      currentField
        .find(
          ".abcbiz-tb-modal-dynamic-select, .abcbiz-tb-modal-additional-select"
        )
        .remove();
      let additionalSelect = getAdditionalSelect(selectedValue);
      if (additionalSelect) {
        $(this).after(additionalSelect);
      }
    }
  );

  $(document).on("change", ".abcbiz-tb-modal-dynamic-select", function () {
    let selectedValue = $(this).val();
    let currentField = $(this).closest(".abcbiz-tb-modal-condition-field");
    let validTypes = [
      "post",
      "in_category",
      "in_category_children",
      "in_post_tag",
      "post_by_author",
      "page",
      "page_by_author",
      "child_of",
      "any_child_of",
      "by_author",
    ];

    if (validTypes.includes(selectedValue)) {
      let searchField = currentField.find(".abcbiz-tb-modal-additional-select");
      if (searchField.length === 0) {
        // If the search field does not exist, add it
        appendAdditionalSelect(currentField, selectedValue);
      } else {
        // If the search field exists, reinitialize it
        updateAdditionalSelect(searchField, selectedValue);
      }
    } else {
      // Remove the search field if the selected value is not in the validTypes array
      currentField
        .find(".abcbiz-tb-modal-additional-select")
        .select2("destroy")
        .remove();
    }
  });
  function getAdditionalSelect(value) {
    if (value === "archive") {
      return (
        '<select class="abcbiz-tb-modal-dynamic-select" name="archive_type">' +
        '<option value="all">All Archives</option>' +
        '<option value="author">Author Archive</option>' +
        '<option value="date">Date Archive</option>' +
        '<option value="search">Search Results</option>' +
        '<option value="post_archive">Posts Archive</option>' +
        "</select>"
      );
    } else if (value === "singular") {
      return (
        '<select class="abcbiz-tb-modal-dynamic-select" name="singular_type">' +
        '<option value="all">All Singular</option>' +
        '<option value="front_page">Front Page</option>' +
        '<optgroup label="Posts">' +
        '<option value="post">Posts</option>' +
        '<option value="in_category">In Category</option>' +
        '<option value="in_category_children">In Category Children</option>' +
        '<option value="in_post_tag">In Tag</option>' +
        '<option value="post_by_author">Posts By Author</option>' +
        "</optgroup>" +
        '<optgroup label="Page">' +
        '<option value="page">Pages</option>' +
        '<option value="page_by_author">Pages By Author</option>' +
        "</optgroup>" +
        '<option value="by_author">By Author</option>' +
        '<option value="not_found404">404 Page</option>' +
        "</select>"
      );
    } else {
      return null;
    }
  }

  function appendAdditionalSelect(currentField, type) {
    let selectHTML =
      '<select class="abcbiz-tb-modal-additional-select" name="details">' +
      '<option value="all" selected>All</option>' + // 'All' option added and set as selected by default
      "</select>";
    let selectElement = $(selectHTML).insertBefore(
      currentField.find(".abcbiz-tb-modal-delete-condition")
    );
    initializeSelect2(selectElement, type);
  }

  function updateAdditionalSelect(selectElement, type) {
    // Destroy the current Select2 instance
    selectElement.select2("destroy");
    // Re-initialize Select2 with the new configuration
    initializeSelect2(selectElement, type);
  }

  function initializeSelect2(selectElement, type) {
    selectElement.select2({
      placeholder: "Type to search...",
      allowClear: true,
      ajax: {
        url: abcbiz_template_conditions.ajaxurl,
        type: "POST",
        dataType: "json",
        delay: 250,
        data: function (params) {
          return {
            action: "abcbiz_select2_search_posts", // The WP AJAX action
            nonce: abcbiz_template_conditions.nonce, // Nonce for security
            searchTerm: params.term, // Search term
            type: type, // Post type or taxonomy
          };
        },
        processResults: function (response) {
          return {
            results: response.data.map(function (item) {
              return { id: item.id, text: item.text };
            }),
          };
        },
        cache: true,
      },
      minimumInputLength: 1,
    });
  }

  $("#abcbiz-tb-modal-condition-form").on("submit", function (e) {
    e.preventDefault();
  });
});