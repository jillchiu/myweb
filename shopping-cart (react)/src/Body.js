import React, { useContext, useState } from "react";
import { filterItems, products } from "./Data.js";
import { CartProvider, useCart } from "./CartContext";

export default function Body() {
  const [query, setQuery] = useState("");
  const [originFilter, setOriginFilter] = useState([]);
  const [tasteFilter, setTasteFilter] = useState([]);
  let results = products;

  function handleChange(e) {
    const inputValue = e.target.value;
    const regex = /^[a-zA-Z]*$/;

    if (regex.test(inputValue)) {
      setQuery(inputValue);
    }
  }

  const handleFilterChange = (filterType, value) => {
    if (filterType === "origin") {
      if (originFilter.includes(value)) {
        setOriginFilter(
          originFilter.filter((checkedValue) => checkedValue !== value)
        );
      } else {
        setOriginFilter([...originFilter, value]);
      }
    } else if (filterType === "taste") {
      if (tasteFilter.includes(value)) {
        setTasteFilter(
          tasteFilter.filter((checkedValue) => checkedValue !== value)
        );
      } else {
        setTasteFilter([...tasteFilter, value]);
      }
    }
  };

  //search set
  if (query.length > 0) {
    results = filterItems(products, query);

    //search & origin set
    if (originFilter.length > 0) {
      results = results.filter((product) =>
        originFilter.includes(product.origin)
      );

      //search & origin & taste set
      if (tasteFilter.length > 0) {
        results = results.filter((product) =>
          tasteFilter.includes(product.taste)
        );
      }
      //search & taste set
    } else if (tasteFilter.length > 0) {
      results = results.filter((product) =>
        tasteFilter.includes(product.taste)
      );
    }
    //origin set
  } else if (originFilter.length > 0) {
    results = products.filter((product) =>
      originFilter.includes(product.origin)
    );

    //origin & taste set
    if (tasteFilter.length > 0) {
      results = results.filter((product) =>
        tasteFilter.includes(product.taste)
      );
    }
    //taste set
  } else if (tasteFilter.length > 0) {
    results = products.filter((product) => tasteFilter.includes(product.taste));
  }

  return (
    <div className="products">
      <div id="grid-selector">
        <SearchBar query={query} onChange={handleChange} />
        <br />
        Origin:
        <OriginFilter
          label="Chicken"
          query="chicken"
          onChange={() => handleFilterChange("origin", "chicken")}
          checked={originFilter.includes("chicken")}
        />
        <OriginFilter
          label="Pork"
          query="pork"
          onChange={() => handleFilterChange("origin", "pork")}
          checked={originFilter.includes("pork")}
        />
        <br />
        Taste:
        <TasteFilter
          label="Sweet"
          query="sweet"
          onChange={() => handleFilterChange("taste", "sweet")}
          checked={tasteFilter.includes("sweet")}
        />
        <TasteFilter
          label="Salty"
          query="salty"
          onChange={() => handleFilterChange("taste", "salty")}
          checked={tasteFilter.includes("salty")}
        />
        <TasteFilter
          label="Sour"
          query="sour"
          onChange={() => handleFilterChange("taste", "sour")}
          checked={tasteFilter.includes("sour")}
        />
        <TasteFilter
          label="Spicy"
          query="spicy"
          onChange={() => handleFilterChange("taste", "spicy")}
          checked={tasteFilter.includes("spicy")}
        />
        <br />
        <h1>Products</h1>
      </div>
      <div id="grid">
        <List items={results} />
      </div>
      <CartToggle />
    </div>
  );
}

function SearchBar({ query, onChange }) {
  return (
    <label>
      Search:
      <input
        value={query}
        onChange={onChange}
        placeholder="Please enter product name..."
        style={{ width: "200px" }}
      />
    </label>
  );
}

function OriginFilter({ label, query, onChange }) {
  return (
    <label>
      <input type="checkbox" value={query} onChange={onChange} />
      {label}
    </label>
  );
}

function TasteFilter({ label, query, onChange }) {
  return (
    <label>
      <input type="checkbox" value={query} onChange={onChange} />
      {label}
    </label>
  );
}

function CartFilter({ query, onChange, checked }) {
  return (
    <>
      <input
        type="checkbox"
        value={query}
        onChange={onChange}
        checked={checked}
      />
    </>
  );
}

function List({ items }) {
  const { addToCart, showCart, setShowCart } = useCart();
  const [isHovered, setIsHovered] = useState(null);

  const handleMouseEnter = (productId) => {
    setIsHovered(productId);
  };

  const handleMouseLeave = () => {
    setIsHovered(null);
  };

  return (
    <>
      {items.map((product) => (
        <div
          className="product"
          key={product.id}
          onMouseEnter={() => handleMouseEnter(product.id)}
          onMouseLeave={handleMouseLeave}
        >
          <img className="productImage" src={product.img} alt="" />
          <br />
          <button
            type="submit"
            id={"add_to_cart_" + product.id}
            className={`${
              isHovered === product.id ? "add_to_cart2" : "add_to_cart"
            }  `}
            onClick={() => {
              addToCart(product.id);
              if (showCart != true) {
                setShowCart(!showCart);
              }
            }}
          >
            Add to Cart
          </button>
          <div className="stats">
            <div
              className="stats-container"
              id={"stats-container_" + product.id}
            >
              <span className="product_price" style={{ marginRight: "-25px" }}>
                ${product.price}
              </span>
              <span className="product_name" style={{ marginLeft: "-25px" }}>
                {product.name}
              </span>
            </div>
          </div>
        </div>
      ))}
    </>
  );
}

function NoOfProductInCart() {
  const { cart } = useCart();
  return (
    <p>
      <span className="product-quantity">{cart.length}</span> Product(s) in
      cart.
    </p>
  );
}

function DetailOfCart() {
  const { cart, setCart, addToCart, decreaseFromCart, removeFromCart } =
    useCart();
  const [isHovered, setIsHovered] = useState(false);

  const handleMouseEnter = (productId) => {
    setIsHovered(productId);
  };

  const handleMouseLeave = () => {
    setIsHovered(null);
  };

  //select product when press checkbox & img & name & price
  function handleToggle(toggledId) {
    setCart((prevCart) => {
      return prevCart.map((item) => {
        if (item.id === toggledId) {
          // Update selected status
          return { ...item, selected: !item.selected };
        }
        return item;
      });
    });
  }

  return (
    <>
      {cart.length > 0 ? (
        <tbody>
          {cart.map((product) => (
            <React.Fragment key={product.id}>
              <tr
                key={product.id}
                style={{
                  background:
                    isHovered === product.id
                      ? "lightblue"
                      : product.selected
                        ? "highlight"
                        : "",
                  color:
                    isHovered === product.id
                      ? "black"
                      : product.selected
                        ? "white"
                        : "black",
                }}
                onMouseEnter={() => handleMouseEnter(product.id)}
                onMouseLeave={handleMouseLeave}
              >
                <td onClick={() => handleToggle(product.id)}>
                  <CartFilter
                    key={product.id}
                    query={product.id}
                    onChange={() => handleToggle(product.id)}
                    checked={product.selected}
                  />
                </td>
                <td
                  style={{ width: "5% !important" }}
                  onClick={() => handleToggle(product.id)}
                >
                  <img
                    src={product.img}
                    style={{ width: "25px", height: "25px" }}
                  />
                </td>
                <td
                  style={{ width: "10% !important" }}
                  onClick={() => handleToggle(product.id)}
                >
                  {product.name}
                </td>
                <td
                  style={{ width: "5% !important" }}
                  onClick={() => handleToggle(product.id)}
                >
                  ${parseInt(product.price)}
                </td>
                <td
                  style={{
                    width: "70% !important",
                    textAlign: "center",
                    padding: "8px !important",
                  }}
                >
                  x
                  <button
                    type="submit"
                    className="decreaseButton"
                    title="Decrease"
                    onClick={() => decreaseFromCart(product.id)}
                  >
                    -
                  </button>
                  {product.quantity}
                  <button
                    type="submit"
                    className="increaseButton"
                    title="Increase"
                    onClick={() => addToCart(product.id)}
                  >
                    +
                  </button>
                </td>
                <td style={{ width: "5% !important" }}>
                  <button
                    type="submit"
                    className="removeButton"
                    title="Remove"
                    style={{ backgroundColor: "red", color: "white" }}
                    onClick={() => removeFromCart(product.id)}
                  >
                    x
                  </button>
                </td>
              </tr>
            </React.Fragment>
          ))}
        </tbody>
      ) : null}
    </>
  );
}

function TotalPrice() {
  const { cart } = useCart();
  const selectedItems = cart.filter((item) => item.selected);
  let total = 0;

  // if (cart.length > 0) {
  //   for (let i = 0; i < cart.length; i++) {
  //     if (cart[i].selected === true) {
  //       total += cart[i].price * cart[i].quantity;
  //     }
  //   }
  // }
  cart.forEach((item) => {
    if (item.selected) {
      total += item.price * item.quantity;
    }
  });

  return (
    <>
      {cart.length > 0 ? (
        <>
          <p>{selectedItems.length} Product(s) selected.</p>
          <p>Total Price: ${total}</p>
        </>
      ) : null}
    </>
  );
}

function CartButton() {
  const { cart, clearCart } = useCart();
  return (
    <>
      {cart.length > 0 ? (
        <>
          <button
            type="submit"
            id="payButton"
            className="button "
            style={{
              width: "50%",
              textDecoration: "none",
              textAlign: "center",
            }}
            onClick={() => {
              if (cart.filter((item) => item.selected).length > 0) {
                alert("Thank you for your purchasing!");
                clearCart(false);
              } else {
                alert("You have not selected any product(s)!");
              }
            }}
          >
            Pay
          </button>
          <button
            type="submit"
            id="emptyButton"
            className="button "
            style={{
              width: "50%",
              textDecoration: "none",
              textAlign: "center",
              background: "rgb(197, 83, 83)",
            }}
            onClick={() => {
              clearCart(true);
            }}
          >
            Empty
          </button>
        </>
      ) : null}
    </>
  );
}

function CartToggle() {
  const { showCart, setShowCart } = useCart();
  return (
    <>
      {showCart && (
        <div className={`products2 ${showCart ? "fadeIn" : "fadeOut"}`}>
          <div className="shopping-cart">
            <h3>
              CART<i className="bi bi-cart"></i>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                className="bi bi-cart"
                viewBox="0 0 16 16"
              >
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
              </svg>
              <img
                id="closeCart"
                width="24"
                height="24"
                src="https://img.icons8.com/material-outlined/24/filled-minus-2-math.png"
                alt="filled-minus-2-math"
                onClick={() => setShowCart(!showCart)}
              />
            </h3>
            <div className="shopping-cart-head">
              <NoOfProductInCart />
              <table style={{ width: "100%" }}>
                <DetailOfCart />
              </table>
              <br />
              <br />
              <TotalPrice />
            </div>
            <div className="cart-buttons">
              <CartButton />
            </div>
          </div>
        </div>
      )}
    </>
  );
}
