import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "./routes/Home";
import Seat from "./routes/Seat";
import Food from "./routes/Food";

function App() {
  return (
    <Router basename={process.env.PUBLIC_URL}>
      <Routes>
        <Route path="/" element={<Home />}></Route>
        <Route path="menu">
          <Route path="food" element={<Food />}></Route>
          <Route path="seat" element={<Seat />}></Route>
        </Route>
      </Routes>
    </Router>
  );
}

export default App;
