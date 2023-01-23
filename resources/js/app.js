import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import { includes } from "lodash";
import.meta.glob(["../img/**"]);

function ConfirmDelete() {
    return confirm("Are you sure you want to delete?");
}
