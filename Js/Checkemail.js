
$(document).ready( function()
                    {
                        $("#emailok").keyup(function()
                                            {
                                                var email = this.value;

                                                $.ajax(
                                                {
                                                    type: "POST",
                                                    url: "Checkemail.php",
                                                    data: email,
                                                    success: function(response)
                                                                {
                                                                    if(response == 1)
                                                                    {
                                                                    $("#checkemail").html("<font color='32CD32'>Disponibile</font>");
                                                                    }

                                                                    else
                                                                    {
                                                                        $("#checkemail").html("<font color='B20000'>Non disponibile</font>");
                                                                        $("#emailok").val("");
                                                                    }
                                                                }
                                                });
                                            });
                    });

