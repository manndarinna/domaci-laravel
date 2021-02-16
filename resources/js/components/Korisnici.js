import React, { Component } from "react";
import ReactDOM from "react-dom";
import Korisnik from "./Korisnik";

export default class Korisnici extends Component {
    constructor(props) {
        super(props);

        this.state = {
            korisnici: []
        };

        this.url = "http://127.0.0.1:8000/";
        this.getKorisnici();
    }

    getKorisnici() {
        axios.get(this.url + "korisnici/get").then(res => {
            const korisnici = res.data.korisnici;
            this.setState({ korisnici: korisnici });
        });
    }
    // novo
    delete(korisnik) {
        this.setState(prevState => {
            return {
                korisnici: prevState.korisnici.filter(k => k.id != korisnik.id)
            };
        });
    }

    render() {
        return (
            <div className="container">
                <h4>Tabela svih korisnika:</h4>

                <div className="row justify-content-center">
                    <table className="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Ime</th>
                                <th scope="col">Email</th>
                                <th scope="col">Akcije</th>
                            </tr>
                        </thead>
                        <tbody style={{ backgroundColor: "#FF934F" }}>
                            {this.state.korisnici.map(korisnik => {
                                return (
                                    <Korisnik
                                        delete={this.delete} //novo
                                        key={korisnik.id}
                                        korisnik={korisnik}
                                    />
                                );
                            })}
                        </tbody>
                    </table>
                </div>
            </div>
        );
    }
}

if (document.getElementById("korisnici")) {
    ReactDOM.render(<Korisnici />, document.getElementById("korisnici"));
}
