
class CommentSystem {
    
    constructor() {
        this.form =  document.querySelector('#send-comment');
        this.lastComment;
    }
    
    prepareData() {
        return new FormData(this.form);
    }

    postComment() {
        fetch('http://feedback.local/post-comment', {
            method: 'POST',
            body: this.prepareData(),
        }).then(function(responce) {
            if (responce.ok) {
                responce => responce.json();
                return true;
            }
            else {
                return false;
            }
        });

    }

    getMessage() {
        fetch('http://feedback.local/get-comment')
            .then(function(responce) {
                responce.json().then(function(json) {
                    this.lastComment = json;
                    console.log(json);
                })
            }) 
        
    }

}

const cs = new CommentSystem();
cs  .form
    .querySelector("#send_comment")
    .addEventListener('click', ()=>{
        cs.postComment();
        cs.getMessage();
    });
