import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class Pocetna extends Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        return (
            <div className="text-white" id="titleContainer">
                <h1 className="">Dobrodosli na CALENDARLY,</h1>
                <h2 align="center">Upravljajte Vasim sastancima!</h2>
            </div>
        );
    }
}
if (document.getElementById("pocetna")) {
    ReactDOM.render(<Pocetna />, document.getElementById("pocetna"));
}
