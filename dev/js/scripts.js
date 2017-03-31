'use strict';
//Generated a function for validating letters only within a string
jQuery.validator.addMethod('lettersonly', function(t, e) {
    return this.optional(e) || /^[a-z,' ']+$/i.test(t);
}, 'Letters and spaces only please');

//generated a method for validating the dat
$.validator.addMethod(
    'dateFormat',
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d\d\d\d?\/\d\d?\/\d\d$/);
    }
);

//generated a method for vaidating a minimumdate
jQuery.validator.addMethod('minDate', function (value, element) {
    var now = new Date();
    var myDate = new Date(value);
    return this.optional(element) || myDate > now;
});


//added a method for checkign quanittyfo checked boxes
$.validator.addMethod('prc', function(value, elem, param) {
    if($('.prc:checkbox:checked').length > 4){
       return true;
   }else {
       return false;
   }
},'You must select at least 5 options');

/*==========================================================================

Login

============================================================================*/
$(function() {
    $('#login').validate({
        rules: {
            username: {
                required: !0,
                minlength: 5,
                lettersonly: !0
            },
            password: {
                required: !0,
                minlength: 4
            }
        },
        messages: {
            username: {
                required: 'Please enter username',
                minlength: 'The password must be at least 5 characters'
            },
            password: {
                required: 'Please enter password',
                minlength: 'The password must be at least 5 characters'
            }
        },
        //if the form validates this code executes
        submitHandler: function(t) {
            $.ajax({
                url: '../../php/functions/_login.php',
                type: 'POST',
                data: {
                    username: $('#username').val(),
                    password: $('#password').val()
                },
                success: function(t) {
                  //display errors if there is an issue
                    if(t.includes('password') || t.includes('username')){
                      alert(t);
                    }else{
                      //relocate the use back
                      document.location.href = './dashboard.php';
                    }
                }
            });
        }
    });
});

/*==========================================================================

create a new report

============================================================================*/
$(function() {
    $('#new_report').validate({
        rules: {
            title: {
                required: !0,
                minlength: 7,
                lettersonly: !0
            },
            lead: {
                required: !0
            },
            date: {
                required: !0,
                dateFormat: true,
                minDate:true
            },
            duration: {
                required: !0,
                number: !0,
                min: 1
            },
            participants: {
                required: !0,
                number: !0,
                min: 1
            },
            test: {
                required: !0
            },
            people: {
                required: !0
            }
        },
        messages: {
            title: {
                required: 'Please give the project a title',
                minlength: 'The title must be atleast 7 characters',
                lettersonly: 'The title must only contain letters'
            },
            lead: {
                required: 'Please assign a project leas'
            },
            date: {
                required: 'Please enter a date',
                dateFormat: 'Please enter a valid date (YYYY/MM/DD)',
                minDate: 'The date must be in the future'
            },
            duration: {
                required: 'Please enter the duration of the project',
                number: 'Please enter a valid duration in days',
                min: 'Please enter a valid duration'
            },
            participants: {
                required: 'Please enter how many participants will be used',
                number: 'Please enter a valid number'
            },
            test: {
                required: 'Please choose atleast one test'
            },
            people: {
                required: 'Please choose some team memebers'
            }
        },
        submitHandler: function(t) {
            //Gather the data!
            var test = '',
                people = '';

                //gather up the selected choice and place them into a string to be sent
                $('input[name=test]').each(function(){
                  if($(this).is(':checked')){
                    if(test === ''){
                      test += $(this).val();
                    }else{
                      test += ',' + $(this).val();
                    }
                  }
                });

                $('input[name=people]').each(function(){
                  if($(this).is(':checked')){
                    if(people === ''){
                      people+= $(this).val();
                    }else{
                      people += ',' + $(this).val();
                    }
                  }
                });
            $.ajax({
                url: '../../php/functions/SQL/_newProject.php',
                type: 'POST',
                data: {
                    title: $('#title').val(),
                    lead: $('#lead').val(),
                    date: $('#date').val(),
                    duration: $('#duration').val(),
                    participants: $('#participants').val(),
                    test: test,
                    people: people
                },
                success: function(t) {
                    if(t === 'Success'){
                      alert('New Project Created Successfully');
                      document.location.href = './dashboard.php';
                    }else{
                      alert('There were the following issues.' + t + '.');
                    }
                }
            });
        }
    });
});

/*==========================================================================

Update security settings

============================================================================*/

$(function() {
    $('#security_form').validate({
        rules: {
            email: {
                required: !0,
                email: !0
            },
            uname: {
                required: !0,
                minlength: 5,
                lettersonly: !0
            },
            pword: {
                required: !0,
                minlength: 4
            },
            npword: {
                required: !0,
                minlength: 4
            },
            cpword: {
                required: !0,
                minlength: 4,
                equalTo: '#npword'
            }
        },
        messages: {
            email: {
                required: 'Please input an email',
                email: 'Please enter a valid email'
            },
            uname: {
                required: 'Please input a username',
                minlength: 'The username must be atleast 5 characters',
                lettersonly: 'The username must only contain letters'
            },
            pword: {
                required: 'Please input a password',
                minlength: 'The password must be atleast 4 characters'
            },
            npword: {
                required: 'Please input a password',
                minlength: 'The password must be atleast 4 characters'
            },
            cpword: {
                required: 'Please input a password',
                minlength: 'The password must be atleast 4 characters',
                equalTo: 'Password must match new password'
            }
        },
        submitHandler: function(t) {

            //submit the form if everything validates, performs the form action
            $(t).ajaxSubmit();
            alert('form submitted');
        }
    });
});
/*==========================================================================

update personal information

============================================================================*/

$(function() {
    $('#personal_form').validate({
        rules: {
            file: {
                extension: 'png|jpeg|jpg'
            },
            name: {
                required:true,
                minlength: 4,
                lettersonly: !0
            },
            jr: {
                required:true,
                minlength: 6,
                lettersonly: !0
            }
        },
        messages: {
            file: {
                extension: 'Only PNG and JPEGs are allowed'
            },
            name: {
                required: 'Please input a name',
                minlength: 'Names must be atleast 4 characters',
                lettersonly: 'Names must only consist of letters'
            },
            jr: {
                required: 'Please enter a jobrole',
                minlength: 'Job roles must be at least 6 characters',
                lettersonly: 'Job roles must only contain letters'
            }
        },
        submitHandler: function(t) {
            $(t).ajaxSubmit();
            alert('Form submitted');
        }
    });
});



/*==========================================================================

Create a new user

============================================================================*/

$(function() {
    $('#new_user').validate({
        rules: {
          email: {
              required: !0,
              email: !0
          },
          username: {
              required: !0,
              minlength: 5,
              lettersonly: !0
          },
          password: {
              required: !0,
              minlength: 4
          },
            name: {
                required:true,
                minlength: 4,
                lettersonly: !0
            },
            jr: {
                required:true,
                minlength: 6,
                lettersonly: !0
            }
        },
        messages: {
          email: {
              required: 'Please input an email',
              email: 'Please enter a valid email'
          },
          username: {
              required: 'Please input a username',
              minlength: 'The username must be atleast 5 characters',
              lettersonly: 'The username must only contain letters'
          },
          password: {
              required: 'Please input a password',
              minlength: 'The password must be atleast 4 characters'
          },
            name: {
                required: 'Please input a name',
                minlength: 'Names must be atleast 4 characters',
                lettersonly: 'Names must only consist of letters'
            },
            jr: {
                required: 'Please enter a jobrole',
                minlength: 'Job roles must be at least 6 characters',
                lettersonly: 'Job roles must only contain letters'
            }
        },
        submitHandler: function(t) {
          $.ajax({
              url: '../../php/functions/SQL/_newMember.php',
              type: 'POST',
              data: {
                  email: $('#email').val(),
                  username: $('#username').val(),
                  password: $('#password').val(),
                  name: $('#name').val(),
                  jr: $('#jr').val()
              },
              success: function(t) {
                alert('in here');
                  if(t === 'Success'){
                    alert('New user created successfully');
                    //reload the current page
                    location.reload();
                  }else{
                    alert('There were the following issues.' + t + '.');
                  }
              }
          });
        }
    });
});


/*==========================================================================

Upgrade a user

============================================================================*/
$('.upgradeUser').click(function(e){
  e.preventDefault();
  var upgradeID = $(this).attr('id');
  $.ajax({
      url: '../../php/functions/SQL/_upgrade.php',
      type: 'POST',
      data: {
          id: upgradeID
      },
      success: function(t) {
          if(t === 'success'){
            alert('Users privileges have been upgraded');
            //reload the current page
            location.reload();
          }else{
            alert('There were some issues');
          }
      }
  });
});

/*==========================================================================

Delete a user

============================================================================*/
$('.deleteUser').click(function(e){
  e.preventDefault();
  var deleteID = $(this).attr('id');
  $.ajax({
      url: '../../php/functions/SQL/_delete.php',
      type: 'POST',
      data: {
          id: deleteID
      },
      success: function(t) {
          if(t === 'success'){
            alert('User has been deleted');
            location.reload();
          }else{
            alert('There was an issue deleting the user');
          }
      }
  });
});



/*==========================================================================

Submit SUS

============================================================================*/
$(function() {
    $('#sus').validate({
        rules: {
          Q1: {
              required: !0,
          },
          Q2: {
              required: !0,
          },
          Q3: {
              required: !0,
          },
          Q4: {
              required: !0,
          },
          Q5: {
              required: !0,
          },
          Q6: {
              required: !0,
          },
          Q7: {
              required: !0,
          },
          Q8: {
              required: !0,
          },
          Q9: {
              required: !0,
          },
          Q10: {
              required: !0,
          }
        },
        messages: {
          Q1: {
              required: 'Please select an option',
          },
          Q2: {
              required: 'Please select an option',
          },
          Q3: {
              required: 'Please select an option',
          },
          Q4: {
              required: 'Please select an option',
          },
          Q5: {
            required: 'Please select an option',
          },
          Q6: {
              required: 'Please select an option',
          },
          Q7: {
              required: 'Please select an option',
          },
          Q8: {
              required: 'Please select an option',
          },
          Q9: {
              required: 'Please select an option',
          },
          Q10: {
              required: 'Please select an option',
          }
        },
        submitHandler: function(t) {
          var submit = '';
          var testId = $('#test').val();
          var participant = $('#participant').val();

          for(var x = 1; x<11;x++){
            if(submit === ''){
              submit = $('input[name=Q' + x + ']:checked').val();
            }else{
              submit += ',' + $('input[name=Q' + x + ']:checked').val();
            }
          }

          $.ajax({
              url: '../../php/functions/SQL/_uploadSUS.php',
              type: 'POST',
              data: {
                test:testId,
                part:participant,
                checked:submit,
                stage:0
              },
              success: function(t) {
                alert(t);
                  if(t === 'Success'){
                    //redirect the use if it is all successful
                    document.location.href = './participants.php?id=' + testId;
                  }else{
                    alert('There seemed to be an issue');
                  }
              }
          });
        }
    });
});


/*==========================================================================

Submit PRC

============================================================================*/

$(function() {
    $('#first').validate({
        rules: {
         selected:{
            required:function (element) {
                var choices = $('.prc input');
                if (choices.filter(':checked').length < 5) {
                    return true;
                }
                return false;
            },
            minlength: 4
          }
        },
        messages: {
          selected:{
            required: 'please select',
            minlength:'select atleast 5'
          }

        },
        submitHandler: function(t) {
          var submit = '';
          var testId = $('#testID').val();
          var participant = $('#participant').val();

          $('.prc input[name=prc[]]:checked').each(function(){
              if(submit === ''){
                submit = $(this).val();
              }else{
                submit += ',' + $(this).val();
              }
          });
          $.ajax({
              url: '../../php/functions/SQL/_uploadPRC.php',
              type: 'POST',
              data: {
                test:testId,
                part:participant,
                checked:submit,
                stage:0
              },
              success: function(t) {
                  alert(t);
                  if(t === 'Success'){
                    document.location.href = './prc.php?id=' + testId + '&participant=' + participant + '&stage=2';
                  }else{
                    alert('There seemed to be an issue');
                  }
              }
          });
        }
    });
});


/*==========================================================================

Submit PRC Final

============================================================================*/

$(function() {
    $('#second').validate({
        rules: {
         selected:{
            required:function (element) {
                var choices = $('.prc input');
                if (choices.filter(':checked').length === 5) {
                    return true;
                }
                return false;
            },
            minlength: 4
          }
        },
        messages: {
          selected:{
            required: 'Please choose only 5',
            minlength:'Please select 5'
          }

        },
        submitHandler: function(t) {

          var submit = '';
          var testId = $('#testID').val();
          var participant = $('#participant').val();

          $('.prc input[name=prc[]]:checked').each(function(){
              if(submit === ''){
                submit = $(this).val();
              }else{
                submit += ',' + $(this).val();
              }
          });

          $.ajax({
              url: '../../php/functions/SQL/_uploadPRC.php',
              type: 'POST',
              data: {
                test:testId,
                part:participant,
                checked:submit,
                stage:1
              },
              success: function(t) {
                  alert(t);
                  if(t === 'Success'){
                    document.location.href = './participants.php?id=' + testId;
                  }else{
                    alert('There seemed to be an issue');
                  }
              }
          });
        }
    });
});

/*==========================================================================

Dynamically Add new Participant

============================================================================*/
$('.add').click(function(){
  var conf = confirm('Would you like to add a new participant');
  var testId = $(this).attr('id');
  if(conf){
    $.ajax({
        url: '../../php/functions/SQL/_newParticipant.php',
        type: 'POST',
        data: {
          test:testId,
        },
        success: function(t) {
            alert(t);
            if(t === 'Success'){
              location.reload();
            }else{
              alert('There was an issue creating a new participant');
            }
        }
    });
  }
});


/*==========================================================================

Complete the project

============================================================================*/
$('.projectComplete').click(function(e){
  e.preventDefault();
  var conf = confirm('Would you like to complete the project');
  var testId = $(this).find('a').attr('id');
  if(conf){
    $.ajax({
        url: '../../php/functions/SQL/_completeTest.php',
        type: 'POST',
        data: {
          test:testId,
        },
        success: function(t) {
            if(t === 'Success'){
              alert('The project has been successfully completed');
              document.location.href = './result.php?id=' + testId;
            }else{
              alert('There was a problem completing the test');
            }
        }
    });
  }
});
