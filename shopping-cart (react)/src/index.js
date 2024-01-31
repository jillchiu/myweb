import React from "react";
import ReactDOM from "react-dom/client";
import Header from "./Header";
import Body from "./Body";
import { CartProvider, useCart } from "./CartContext";
import "./index.css";

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <div>
    <CartProvider>
      <Header />
      <Body />
    </CartProvider>
  </div>
);
