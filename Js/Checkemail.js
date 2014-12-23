
$(document).ready( function()
                    {
                        $("#emailok").keyup(function()
                                            {
                                                var emailok = this.id;

                                                $.ajax(
                                                {
                                                    type: "POST",
                                                    url: "Checkemail.php",
                                                    data: emailok+"="+this.value,
                                                    success: function(respons)
                                                                {
                                                                    if(response == "yes")
                                                                    {                                                var response = "yes";

                                                                        $("#checkemail").html("<font color='B20000'>Non disponibile</font>");
                                                                        $("#emailok").val("");
                                                                    }

                                                                    else
                                                                    {
                                                                        $("#checkemail").html("<font color='32CD32'>Disponibile</font>");
                                                                    }
                                                                }
                                                });
                                            });
                    });

