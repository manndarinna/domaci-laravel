import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class Korisnik extends Component {
    constructor(props) {
        super(props);

        this.state = {
            korisnik: this.props.korisnik
        };
        this.url = "http://127.0.0.1:8000/";
    }
    delete() {
        this.props.delete(this.state.korisnik);
    }

    render() {
        return (
            <tr>
                <td>{this.state.korisnik.ime_korisnik} </td>
                <td>{this.state.korisnik.email_korisnik}</td>

                <td>
                    <a
                        href={
                            "http://127.0.0.1:8000/termini/getKreirao?id_korisnik=" +
                            this.state.korisnik.id +
                            "&ime_korisnik=" +
                            this.state.korisnik.ime_korisnik
                        }
                        className="btn btn-primary"
                    >
                        Moji termini{" "}
                    </a>

                    <a
                        onClick={this.delete.bind(this)}
                        className="btn btn-danger"
                    >
                        Obrisi
                    </a>
                </td>
            </tr>
        );
    }
}

if (document.getElementById("korisnik")) {
    ReactDOM.render(<Korisnik />, document.getElementById("korisnik"));
}
