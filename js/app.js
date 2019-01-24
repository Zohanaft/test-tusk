const GET_MSG       = 'http://feedback.local/get-comment';
const POST_MSG      = 'http://feedback.local/post-comment';
const IMG_URL       = 'http://feedback.local/assets/nav_self_1366117.png';

class CommentSystem {
    /**
     * description
     * buttonId {string} form button selector
     * commentListId {string} comment list (ul) selector
     * geturl {string}
     * postUrl {string}
     */ 
    constructor(buttonId, formId, commentListId, getUrl, postUrl) {
        this.form           =  document.querySelector(formId);
        this.lastComment;
        this.get            = getUrl;
        this.post           = postUrl;
        this.data;
    }
    csPrepareData() {
        return new FormData(this.form);
    }

    csPostComment() {
        return fetch(this.post, {
            method: 'POST',
            body: this.csPrepareData(),
        })
        .then(responce => {
            if (responce.ok) 
                responce => responce.json();
        })
        .then(responce => {
            this.csGetMessage();
        })
        .catch(err => {
            console.log("Post message error: " + err);
        });

    }

    csGetMessage(numof) {
        console.log(numof);
        var get = numof ? this.get + '?' + numof : this.get;

        fetch(get)
            .then( responce => {
                if (responce.ok) {
                    responce.json().then(json=>{
                        this.data = json;
                        this.lastComment = json[json.length-1]['id'];
                        console.log(this.lastComment);
                    });
                }
            })
            .catch(err=> {
                console.log("Getting Message error: " + err);
            });
    }
 
    csGetMsgPool(num=10){
        this.csGetMessage(num);
    }
    
    csRender() {
        this.data.forEach((comment)=>{
            
        });
    }

    csCommentListManager() {
        
    }
}

const cs = new CommentSystem("#send_comment", 
    "#send-comment", 
    "#com-list", 
    GET_MSG, POST_MSG);

document.addEventListener("DOMContentLoaded", () => {
    cs.csGetMsgPool(10);
});

cs  .form
    .querySelector("#send_comment")
    .addEventListener('click', ()=>{
        cs.csPostComment();
        
    })

