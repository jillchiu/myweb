import React, { useEffect, useState } from "react";
import { weatherOptions } from "./Data.js";
import { CartProvider, useCart } from "./CartContext";

const Header = () => {
  const { showCart, setShowCart } = useCart();
  return (
    <div className="head">
      <h3 id="head_title">Jber Eats</h3>
      <nav className="header-nav">
        <ul id="head_link">
          <li>
            <WeatherForecast />
          </li>
          <li>
            <a href="https://github.com/jillchiu/myweb">Github</a>
          </li>
          <li>
            <a href="#" onClick={() => setShowCart(!showCart)}>
              Cart
            </a>
          </li>
        </ul>
      </nav>
    </div>
  );
};

const WeatherForecast = () => {
  const [selectedCity, setSelectedCity] = useState("130010"); // default tokyo, control api where the city part
  const [weatherData, setWeatherData] = useState(null); // data selected by city and date, use for finally show
  const [weatherData2, setWeatherData2] = useState([]); // data selected by city, use for make the select option for date
  const [weatherData3, setWeatherData3] = useState("今日"); //default today, control api where the datelabel part

  useEffect(() => {
    fetch(`https://weather.tsukumijima.net/api/forecast?city=${selectedCity}`)
      .then((response) => response.json())
      .then((data) => {
        const tomorrowForecast = data.forecasts.find(
          (forecast) => forecast.dateLabel === weatherData3
        );
        const trys = data.forecasts.map((forecast) => ({
          date: forecast.date,
          dateLabel: forecast.dateLabel,
          telop: forecast.telop,
          max: forecast.temperature.max.celsius,
          min: forecast.temperature.min.celsius,
        }));

        setWeatherData2(trys);

        setWeatherData(tomorrowForecast);
      })
      .catch((error) => console.error("Error fetching weather data:", error));
  }, [selectedCity, weatherData3]); // render when selectedCity / weatherData3 change

  const handleSelectChange = (event) => {
    setSelectedCity(event.target.value);
  };

  const handleSelectChange2 = (event) => {
    setWeatherData3(event.target.value);
  };

  if (!weatherData) {
    return <div>Loading...</div>;
  }

  return (
    <div style={{ marginTop: "-30px" }}>
      Weather API for
      <select
        id="weatherSelect"
        onChange={handleSelectChange}
        value={selectedCity}
      >
        {Object.entries(weatherOptions).map(([province, cities]) => (
          <optgroup key={province} label={province}>
            {cities.map((city) => (
              <option key={city.value} value={city.value}>
                {city.label}
              </option>
            ))}
          </optgroup>
        ))}
      </select>
      <br />
      Date：
      <select
        id="dateSelect"
        onChange={handleSelectChange2}
        value={weatherData3}
      >
        {weatherData2.map((date) => (
          <option key={date.date} value={date.dateLabel}>
            {date.date}
          </option>
        ))}
      </select>
      Weather：{weatherData.telop} Max：
      {weatherData.temperature.max.celsius} °C Min：
      {weatherData.temperature.min.celsius} °C
    </div>
  );
};

export default Header;
