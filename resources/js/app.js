import './bootstrap';

window.addEventListener('DOMContentLoaded',function(event){
    let deleteButtons=document.querySelectorAll('.delete-quiz');

    deleteButtons.forEach(deleteButton =>{
        deleteButton.addEventListener('click',function(event){
            let quizId=this.dataset.id;

            if (!confirm('id:'+quizId+' のQuizを削除')) {
                return;
            }

            axios.delete('/quizzes'+quizId).then(function(response){
                let row=event.target.closest("tr");
                row.parentNode.removeChild(row);

                alert('削除')
                console.log;
            })

            .catch(function (error) {
                // リクエストで何らかのエラーが発生した場合
                alert(error)
                console.log(error);
            });
        });
    });
});

