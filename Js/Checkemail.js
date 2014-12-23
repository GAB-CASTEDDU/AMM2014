$(document).ready( function()
                    {
                        $("#emailok").keyup(function()
                                            {
                                                var emailok = $("#emailok");

                                                $.ajax(
                                                {
                                                    type: "POST",
                                                    url: "Checkemail.php",
                                                    data: "emailok="+emailok.val(),
                                                    success: function(response)
                                                                {
                                                                    if(response == "yes")
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
