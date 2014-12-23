$(document).ready( function()
                    {
                        $("#emailok").keyup(function()
                                            {
                                                var emailok = $("#emailok").val();

                                                $.ajax(
                                                {
                                                    type: "POST",
                                                    url: "Checkemail.php",
                                                    data: emailok,
                                                    success: function()
                                                                {respo = "<?php echo($variabile); ?>";
                                                                    if(respo == 1)
                                                                    {
                                                                        $("#checkemail").html("<font color='32CD32'>Disponibile</font>");
                                                                        echo "response";
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
