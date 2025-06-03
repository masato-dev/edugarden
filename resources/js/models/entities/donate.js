class Donate {
    constructor(id, name, email, phone, amount, note) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.phone = phone;
        this.amount = amount;
        this.note = note;
    }

    static fromJson(json) {
        return new Donate(
            json.id,
            json.name,
            json.email,
            json.phone,
            json.amount,
            json.note
        );
    }

}

window.Donate = Donate;