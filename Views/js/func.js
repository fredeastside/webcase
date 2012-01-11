	function Validation()
	{
        var ret = true;

        $("#regform input").each(function(e){

            var border = $(this).css("border");
            var inpt_id = $(this).attr("id");

            if ($(this).val() == '')
            {
                $(this).css("border", "1px solid #ff0000");
                $("#msg_" + inpt_id).show("slow");

                ret = false;

                return false;
            }
            else
            {
                $(this).css("border", border);
                $("#msg_" + inpt_id).hide();
            }
        });

        return ret;
	}
