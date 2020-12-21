// alert ('coucou'); ==>> pour valider que la page charge bien 

//  --------  Pour permettre l'affichage dans la page cible  -------------------- //
/**
 *              <div class="error"><span></span></div>
                <form method="POST" id="Validate_form">
 * 
 * 
 *********************************************************************************/

$(function(){

$("#Validate_form").validate({
    debug: false,
    
    submitHandler: function(form) {
        form.submit();
    },
    invalidHandler: function(event, validator) {
        // 'this' refers to the form
        var errors = validator.numberOfInvalids();
        if (errors) {
          var message = errors == 1
            ? 'Vous avez oublié 1 champs de saisie. Merci de le compléter ;-)'
            : 'Vous avez oublié ' + errors + ' champs de saisie. Ils sont indiqués ci-dessous ... ;-)';
          $("div.error span").html(message);
          $("div.error").show();
        } else {
          $("div.error").hide();
        }
      },

/* ********************************************************************************************** */
/*                                              RULES                                             */
/* ********************************************************************************************** */

      rules: {
        // simple rule, converted to {required:true}
        nom: {
            required: true,
            minlength: 2
          },
          
        prenom: {
            required: true,
            minlength: 2
        }, 
        date_naissance: {
            required: true,
            
          }, 

        moyenne: {
            required: true,
            minlength: 2
        },
        
        appreciation: {
            required: true,
            minlength: 2
          },

/* ********************************************************************************************** */
/*                                          Compound rule                                         */
/* ********************************************************************************************** */

            messages: {
                nom: {
                    required: ' Vous avez ommis de mettre le nom de l\'élève',
                    minlength: jQuery.validator.format(' Le nom de l\'élève doit contenir un minimun de 2 caractères')
                } 
            }           
        }
    });
});




/* 



appreciation: {
                required: true,
                minlength: 2
            },
        },
        messages: {
            nom: {
                required: ' Vous avez ommis de mettre le nom de l\'élève',
                minlength: jQuery.validator.format(' Le nom de l\'élève doit contenir minimun 2 caractères')
            }, 
        }           
}            */