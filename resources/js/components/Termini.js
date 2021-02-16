import React, { Component } from "react";
import ReactDOM from "react-dom";
import Termin from "./Termin";

export default class Termini extends Component {
    constructor(props) {
        super(props);

        this.state = {
            termini: []
        };

        this.url = "http://127.0.0.1:8000/";
        this.getTermini();
    }

    getTermini() {
        axios.get(this.url + "termini/get").then(res => {
            const termini = res.data.termini;
            this.setState({ termini: termini });
        });
    }

    render() {
        return (
            <div className="container">
                <h4>Pregled svih termina:</h4>
                <div className="row justify-content-center">
                    <table className="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Naziv</th>
                                <th scope="col">Pocinje u</th>
                                <th scope="col">Zakazao</th>
                                <th scope="col">Zavrsen u</th>
                            </tr>
                        </thead>
                        <tbody style={{ backgroundColor: "#FF934F" }}>
                            {this.state.termini.map(termin => {
                                return (
                                    <Termin key={termin.id} termin={termin} />
                                );
                            })}
                        </tbody>
                    </table>
                </div>
            </div>
        );
    }
}

if (document.getElementById("termini")) {
    ReactDOM.render(<Termini />, document.getElementById("termini"));
}
