
$(document).ready( function()
                    {
                        $("#emailok").keyup(function()
                                            {
                                                var emailok = this.value;

                                                $.ajax(
                                                {
                                                    type: "POST",
                                                    url: "Checkemail.php",
                                                    data: emailok,
                                                    success: function(($_COOKIE["emok"])
                                                                {
                                                                    if($_COOKIE["emok"] == "yes")
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

