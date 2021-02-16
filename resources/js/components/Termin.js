import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class Termin extends Component {
    constructor(props) {
        super(props);

        this.state = {
            termin: this.props.termin
        };
    }

    render() {
        return (
            <tr>
                <td>{this.state.termin.naziv_termin}</td>
                <td>{this.state.termin.pocinje_at}</td>
                <td>{this.state.termin.email_kreirao}</td>
                <td>{this.state.termin.zavrsen_at}</td>
            </tr>
        );
    }
}

if (document.getElementById("termin")) {
    ReactDOM.render(<Termin />, document.getElementById("termin"));
}
