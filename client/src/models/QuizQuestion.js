class QuizQuestion {
    constructor(
        id = -1,
        question = "",
        answers = []
    ) {
        this.id = id;
        this.question = question;
        this.answers = answers;
    }
    validate() {
        if(
            this.id === -1 ||
            this.question === "" ||
            this.answers.length === 0
        ) {
            return false;
        } else {
            return true;
        }
    }
}

export default QuizQuestion;