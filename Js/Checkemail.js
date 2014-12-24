$(document).ready( function()
                    {
                        $("#emailok").blur(function()
                                            {
                                                var emailok = $("#emailok").val();

                                                $.ajax(
                                                {
                                                    type: "POST",
                                                    url: "Checkemail.php",
                                                    data: emailok,
                                                    success: function(response)
                                                                {
                                                                    if(response == 0)
                                                                    {
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
