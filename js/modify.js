function SubmitFormData() {
    var id = $("#id").val();

    $.post("modifyform.php", { id: id },
    function(data) {
	 $('#form1').html(data);
	 $('#modifyform')[0].reset();
    });
}
