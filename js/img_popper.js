    // popovers initialization - on hover
    $('[data-toggle="popover-hover"]').popover({
      html: true,
      trigger: 'hover',
      placement: 'bottom',
      content: function () { return '<img src="' + $(this).data('img') + '" />'; }
    });

    // popovers initialization - on click
    $('[data-toggle="popover-click"]').popover({
      html: true,
      trigger: 'click',
      placement: 'bottom',
      content: function () { return '<img src="' + $(this).data('img') + '" />'; }
    });