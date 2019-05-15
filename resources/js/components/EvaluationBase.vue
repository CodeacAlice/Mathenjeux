<template>
    <div>
        <div class="btnContainer"><button id="btnTest" @click="getquestions"><a href="#modaleval" rel="modal:open">Test final</a></button></div>
        <div id="modaleval" class="modal">
            <h3>Test de fin de chapitre</h3>
            <div v-show="!end">
                <p>Si plusieurs nombres sont demandés dans la réponse, rangez-les dans l'ordre croissant et séparez-les par un point-virgule.</p>
                <p>Question {{nb}}/{{nbtot}} :</p>
                <p>{{questions[nb-1].question}}</p>
                <div v-show="!hasrep && questions[nb-1].id!==0" id="inputevalcontainer">
                    <input id="inputeval" type="text" v-model="answer" v-on:keyup.enter="submitanswer" maxlength="255">
                    <button @click="submitanswer">Répondre</button>
                </div>
                <div v-show="hasrep && questions[nb-1].id!==0">
                    {{message}}
                    <button @click="next">Suite</button>
                </div>
            </div>
            <div v-show="end">
                <p>Le quiz est terminé !</p>
                <p>Votre score est de {{score}}/100</p>
                <p v-show="score===100">Félicitations ! Vous avez validé le chapitre ! 😁</p>
                <button><a href="#" rel="modal:close">Fermer</a></button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'EvaluationBase',
        props: {
            idchap: String
        },
        data () {
            return {
                questions: [
                    {
                        id: 0,
                        question: 'Si vous voyez ce message, c\'est que votre connexion est extrêmement lente ou que le site a un problème. N\'hésitez pas à contacter les administrateurs si le problème persiste (on ne peut en revanche rien faire pour votre connexion).'
                    }
                ],
                score: 0,
                nb: 1,
                nbtot: 1,
                answer: '',
                message: '',
                hasrep: false,
                end: false
            }
        },
        methods: {
            getquestions() {
                this.score = 0;
                this.nb = 1;
                this.answer = '';
                this.end = false;
                this.hasrep = false;
                axios
                    .get('http://127.0.0.1:8000/api/evaluations/chap/'+this.idchap)
                    .then(response => {
                        this.questions = response.data;
                        this.nbtot = this.questions.length;
                        this.handleResize();
                    })
            },
            submitanswer() {
                if (this.answer !== '') {
                    var rep = ''+this.answer;
                    rep = rep.replace( /\s/g, '').replace( /&/g, '%26').toLowerCase();
                    axios
                        .get('http://127.0.0.1:8000/api/evaluations/'+this.questions[this.nb-1].id+'/check/?answer='+rep)
                        .then(response => {
                            if (response.data) {
                                this.message = 'Exact !';
                                this.score += 100/this.nbtot;
                            } else {
                                this.message = 'Oups...';
                            }
                            this.hasrep = true;
                        })
                }
            },
            next() {
                this.answer = '';
                this.hasrep = false;
                if (this.nb < this.nbtot) {
                    this.nb++;
                } else {
                    this.score = parseInt(this.score);
                    this.end = true;
                }
            },
            handleResize() {
                $('#inputeval').css('max-width', $('#inputevalcontainer').width());
            }
        },
        mounted() { 
            window.addEventListener('resize', this.handleResize);
            this.handleResize();
        }
    }

    
</script>
<style>
    #modaleval {height: auto;}

    .modal a.close-modal {
        display: none;
    }
    a {color: #542f08;}

    #inputeval {
        box-sizing: border-box;
    }

    .blocker {z-index: 3;}
    
</style>
