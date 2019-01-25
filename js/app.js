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
        this.buttonId = buttonId
        this.form           =  document.querySelector(formId); 
        this.comment_list = document.querySelector(commentListId);
        this.get            = getUrl;
        this.post           = postUrl;
        this.data;
        
        this.lastComment;
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
            this.csGetMessage(1);
        })
        .then(()=>{
            this.csRender();
        })
        .catch(err => {
            console.log("Post message error: " + err);
        });

    }

    async csGetMessage(numof) {
        // По дефолту с сервера идет только однановость
        let get = numof 
            ? this.get + '?' + numof 
            : this.get;
            
        await fetch(get)
            .then( responce => {
                if (responce.ok) {
                    responce.json().then(json=>{
                        this.data = json;
                        this.lastComment = json[json.length-1]['id'];
                        return true;
                    }).then(()=>{
                        this.csRender();
                    });
                }
            })
            .catch(err=> {
                this.data = new Error('Error getting data: ' + err);
            })
        return this.data;
    }
 
    async csGetMsgPool(num=10){
        this.csGetMessage(num);
    } 

    csRender() {
        this.data.forEach((comment)=>{
            let li = document.createElement('li');
            let html = `<div class="comment">
                <div class="self-photo">
                    <a href="#" class="self-link">
                        <img src="${IMG_URL}" alt="">
                    </a>
                </div>
                <div class="main-comment"> 
                    <p class="self-info">
                        ${comment.surname}
                        ${comment.firstname} 
                        ${comment.lastname}
                    <p class="self-comment">
                        ${comment.comment}
                    </p>
                    <p class="self-comment-time">
                        ${comment.dt}
                    </p>
                </div>
            </div>`;
            
            li.innerHTML = html;
            
            if (this.data.length == 1) {
                this.comment_list.insertBefore(li, this.comment_list.firstChild)
            }
            else { 
                this.comment_list.appendChild(li)
            }
        });
        this.data = null;
    }
}

const cs = new CommentSystem("#send_comment", 
    "#send-comment", 
    "#com-list", 
    GET_MSG, POST_MSG);

cs  .csGetMsgPool(13);
cs  .form
    .querySelector("#send_comment")
    .addEventListener('click', ()=>{
        cs.csPostComment();
        
    })

