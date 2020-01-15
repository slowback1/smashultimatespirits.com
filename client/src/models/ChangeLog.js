class ChangeLog {
    constructor(
        user = "",
        type = "",
        value = ""
    ) {
            switch(type) {
                case "sa":
                    this.type = "Spirit Add";
                    break;
                case "se":
                    this.type = "Spirit Edit";
                    break;
                case "sd":
                    this.type = "Spirit Delete";
                    break;
                case "qa":
                    this.type = "Quiz Add";
                    break;
                case "qe":
                    this.type = "Quiz Edit";
                    break;
                case "qd":
                    this.type = "Quiz Delete";
                    break;
                default: 
                    this.type = "[REDACTED]";
                    break;
            }
            let val = value.split("&STOP1;");
            val.map(function(v, i){
                val[i] = v.split("&STOP2;");
                return '';
            });
            this.value = val;
            this.user = user;
        }
    }


export default ChangeLog;