class Spirit {
    constructor(
            id = -1, 
            name = "", 
            game1 = "",
            game2 = "", 
            series = "", 
            description = "", 
            author = ""
            ) {
        this.id = id;
        this.name = name;
        this.game1 = game1;
        this.game2 = game2;
        this.series = series;
        this.description = description;
        this.author = author;
    }
    validate() {
        if(
            this.id === -1 ||
            this.name === "" ||
            this.game1 === "" ||
            this.game2 === "" ||
            this.series === "" ||
            this.description === "" ||
            this.author === ""
            ) {
                return false;
            } else {
                return true;
            }
    }
}

export default Spirit;