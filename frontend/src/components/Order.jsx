import { Nav, Card, Col, Row } from "react-bootstrap";

const Order = ({ orders }) => {
	return (
		<Col md={10}>
			<Row xs={1} md={3} className="g-4">
				{orders.map((order) => {
					return (
						<Col key={order.id} className="d-flex flex-row flex-wrap">
							<Card>
								<Card.Body>
									<Card.Title>{order.load_type}</Card.Title>
									{/*<Card.Subtitle className="my-2 text-muted">*/}
									{/*	<p className="my-0">*/}
									{/*		<small>Author: {article.author.split(",")[0]}</small>*/}
									{/*	</p>*/}
									{/*	<p className="my-1">*/}
									{/*		<small>Published: {new Date(article.published_at).toDateString()}</small>*/}
									{/*	</p>*/}
									{/*	<p className="my-0">*/}
									{/*		<small>Category: {article.category}</small>*/}
									{/*	</p>*/}
									{/*</Card.Subtitle>*/}
									{/*<Card.Text>{article.description.substr(0, 100) + ` ...more`}</Card.Text>*/}
									{/*<Nav.Link href={article.url} target="_blank">*/}
									{/*	Click to read full news from-<strong>{` ${article.source_name}`}</strong>*/}
									{/*</Nav.Link>*/}
								</Card.Body>
							</Card>
						</Col>
					);
				})}
			</Row>
		</Col>
	);
};

export default Order;
