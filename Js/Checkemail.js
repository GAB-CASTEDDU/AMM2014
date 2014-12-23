
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
                                                                        $("#checkemail").html("Non disponibile").style.color("#B20000");
                                                                        $("#emailok").val("");
                                                                    }
                                                                }
                                                });
                                            });
                    });

