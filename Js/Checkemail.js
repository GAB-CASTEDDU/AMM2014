<script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>
<script type="text/javascript">

$(document).ready( function()
                    {
                        $("#emailok").keyup(function()
                                            {
                                                var email = this.id;

                                                $.ajax(
                                                {
                                                    type: "POST",
                                                    url: "Checkemail.php",
                                                    data: email+"="+this.value,
                                                    success: function(response)
                                                                {
                                                                    if(response == "0")
                                                                    {
                                                                    $("#checkemail").html("Disponibile");
                                                                    }

                                                                    else
                                                                    {
                                                                        $("#checkemail").html("Non disponibile");
                                                                        $("#emailok").val("");
                                                                    }
                                                                }
                                                });
                                            });
                    });
</script>
