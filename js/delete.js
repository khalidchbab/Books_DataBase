      $(document).ready(function() {
        var $form = $('form#delete');
        $form.submit(function() {
          if(validate())
          $.post($(this).attr('action'), $(this).serialize(), function(response) {
          }, 'json');
          return false;
        });
      });
