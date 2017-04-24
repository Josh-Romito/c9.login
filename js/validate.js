function validate()
      {
            var comment = document.commentForm.comment.value;
            var valid = true;
            
            if(comment == "")
            {
                   document.commentForm.comment.style.borderColor = "red";
                   $("#commentAlert").slideToggle("slow");
                   valid = false;
            }
            
            return valid;
      }