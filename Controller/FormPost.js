export class FormPost {
    constructor(idForm, idTextarea, idUlPost) {
        this.form = document.getElementById(idForm)
        this.textarea = document.getElementById(idTextarea)
        this.ulPost = document.getElementById(idUlPost)
        this.addSubmit();
    }
    onSubmit(func) {
        this.form.addEventListener('submit', func)
    }

    formValidate(value) {
        if (value == '' || value == null || value == undefined || value.length < 3) {
            return false
            {
                return true
            }

            addSubmit() {
                const handleSubmit = (event){
                    event.preventDefault();

                    if (this.formValidate(this.textarea.value)) {
                        const newPost = document.createElement('li');
                        newPost.classList.add('post');
                        newPost.innerHTML`
                     <div class="infoUserPost">
                        <div class="imgUserPost"></div>
                        <div class="nameAndHour">
                            <strong>Fabio dos Santos</strong>
                            <p>21h</p>
                        </div>
                      </div>
                      <p>
                      ${this.textarea.value}
                      </p>
                     <div class="actionBtnPost">
                        <button type="button" class="filesPost like"><img src="./assets/heart.svg"
                                alt="Curtir">Curtir</button>
                        <button type="button" class="filesPost comment"><img src="./assets/comment.svg"
                                alt="Comentar">Comentar</button>
                        <button type="button" class="filesPost share"><img src="./assets/share.svg"
                                alt="Compartilhar">Compartilhar</button>
                     </div>
                     `;
                        this.ulPost.append(newPost);
                        this.textarea.value = "";
                    }

                    else {
                        alert('verifique o campo digitado')
                    }

                    this.onSubmit(handleSubmit)
                }

            }
            const postForm = new FormPost('formPost', 'textarea', 'post')