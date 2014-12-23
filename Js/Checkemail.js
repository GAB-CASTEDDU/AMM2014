
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
                                                    success: function(response)
                                                                {
                                                                    success: function(response) {
        alert(response); // la richiesta ha avuto successo
     },
     error: function(xhr) {
        alert('Error!  Status = ' + xhr.status); // errore
     }
                                                                }
                                                });
                                            });
                    });

