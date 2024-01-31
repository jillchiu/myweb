import React, { createContext, useState, useContext } from "react";
import { filterItems, products } from "./Data";

const CartContext = createContext();

export const CartProvider = ({ children }) => {
  const [cart, setCart] = useState([]);
  const [showCart, setShowCart] = useState(true);

  const addToCart = (productId) => {
    const productToAdd = products.find((product) => product.id === productId);
    if (!productToAdd) return; // when product id not found, return

    const existingCartItemIndex = cart.findIndex(
      (item) => item.id === productId
    );
    if (existingCartItemIndex !== -1) {
      // product existed in cart, no + 1
      const updatedCart = [...cart];
      updatedCart[existingCartItemIndex].quantity += 1;
      setCart(updatedCart);
    } else {
      // product not existed in cart, create new record
      const newCartItem = {
        id: productToAdd.id,
        name: productToAdd.name,
        img: productToAdd.img,
        price: productToAdd.price,
        quantity: 1,
        selected: true,
      };
      setCart([...cart, newCartItem]);
    }
  };

  const decreaseFromCart = (productId) => {
    const productToAdd = products.find((product) => product.id === productId);
    if (!productToAdd) return;

    const existingCartItemIndex = cart.findIndex(
      (item) => item.id === productId
    );
    if (existingCartItemIndex !== -1) {
      const updatedCart = [...cart];
      if (updatedCart[existingCartItemIndex].quantity > 1) {
        updatedCart[existingCartItemIndex].quantity -= 1;
        setCart(updatedCart);
      }
    }
  };

  const removeFromCart = (productId) => {
    const updatedCart = cart.filter((item) => item.id !== productId);

    setCart(updatedCart);
  };

  const clearCart = (e) => {
    //if true => empty, false => remove seleted=true from cart
    if (e) {
      setCart([]);
    } else {
      cart.forEach((item) => {
        if (item.selected) {
          const updatedCart = cart.filter((item) => item.selected != true);
          setCart(updatedCart);
        }
      });
    }
  };

  return (
    <CartContext.Provider
      value={{
        cart,
        setCart,
        addToCart,
        decreaseFromCart,
        removeFromCart,
        clearCart,
        showCart,
        setShowCart,
      }}
    >
      {children}
    </CartContext.Provider>
  );
};

export const useCart = () => {
  return useContext(CartContext);
};
